<?php

namespace App\Http\Controllers;

use App\Mail\ReviewCreateMail;
use App\Models\Review;
use App\Models\Game;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
	public function __construct(Review $review, Game $game, Device $device)
	{
		$this->review  = $review;
		$this->game    = $game;
    $this->device  = $device;
	}

	// Reviewページ
	public function index()
	{
		if(Gate::allows('admin')){
			// 管理者だけ処理を実行します
		}
		if(Gate::denies('read')){
			// 閲覧者を除いて処理を実行します
		}
		$reviews = $this->review->approval();
		return view('review.index', compact('reviews'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		$game = $this->game->find($request->game_id);
		$device_all = $this->device->get();
		$playtimes  = config('playtime');
		return view('review.create', compact('game', 'device_all', 'playtimes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	//レビューページで入力されたデータを保存
	public function store(Request $request)
	{
		$review           = new Review();
		$review->user_id  = Auth::user()->id;
		$review->game_id  = $request->input('game');
		$review->graphic  = $request->input('graphic');
		$review->volume   = $request->input('volume');
		$review->sound    = $request->input('sound');
		$review->story    = $request->input('story');
		$review->comfort  = $request->input('comfort');
		$review->score    = $request->input('score');
		$review->playtime = $request->input('playtime');
		$review->review   = $request->input('review');
		$review->save();
    $review->device()->sync($request->devices);
		$user_name  = Auth::user()->name;
		$game_title = $this->game->find($review->game_id)->title;
		Mail::to(env('MAIL_ADMIN_TO_ADDRESS', 'undefind@mail.com'))
			->send(new ReviewCreateMail($user_name, $game_title));
		return redirect()->route('review.show', $review->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$review = $this->review->find($id);
		$game = $this->game->find($review->game_id);
		return view('review.show', compact('review', 'game'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

	// 承認待ちレビューページ
	public function unapproved()
	{
		$reviews = $this->review->unapproved();
		return view('review.unapproved', compact('reviews'));
	}

	// 承認変更アクション
	public function approval_change(Request $request)
	{
		$approval = $request->input('approval');
		$approval = $approval === 'true' ? 1 : 0;
		$review_id  = $request->input('review');
		$review = $this->review::find($review_id);
		$review->is_approval = $approval;
		$review->save();
		header('Content-type: application/json');
    echo json_encode($approval);
	}
}
