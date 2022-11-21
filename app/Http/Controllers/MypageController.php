<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Mypage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MypageController extends Controller
{
	public function index()
	{
		if (Gate::allows('admin')) {
			// 管理者だけ処理を実行します
		}
		if (Gate::denies('member')) {
			// 閲覧者を除いて処理を実行します
		}
		$user = Auth::user();
		$reviews = $user->review;
		$sex = "";
		$area = "";
		$twitter = "";
		$genres = [];
		$self_info = "";
		$tel = "";
		$mypage = $user->mypage;
		if ( $mypage ) {
			$self_info = $mypage->self_info;
			$tel = $mypage->tel;
			$mypage_genres = $mypage->genre;
			$genres = [];
			foreach ($mypage_genres as $k => $v) {
				$genres[] = $v->name;
			}
			$sexs = config('sex');
			$sex = $sexs[$mypage->sex];
			$twitter = 'https://twitter.com/' . $mypage->twitter;
			$prefectures = config('pref');
			$area = $prefectures[$mypage->area];
		}
		return view('mypage.index', compact(
			'user',
			'reviews',
			'mypage',
			'self_info',
			'tel',
			'sex',
			'area',
			'twitter',
			'genres',
		));
	}

	public function update(Request $request)
	{
		$request->validate([
			'self_info'   => 'nullable|max:2000',
			'name'        => 'required|max:20',
			'name_kana'   => 'required|max:20',
			'sex'         => 'required|between:1,2',
			'birth_date'  => 'nullable|date_format:Y-m-d',
			'area'        => 'nullable|between:1,47',
			'tel'         => 'nullable|numeric',
			'nickname'    => 'required|max:20',
			'twitter'     => 'nullable|max:50',
			'genre'       => 'nullable|array',
		]);
		$user             = Auth::user();
		$user->name       = $request->name;
		$user->name_kana  = $request->name_kana;
		$user->birth_date = $request->birth_date;
		$user->nickname   = $request->nickname;
		$user->save();
		$mypage = Auth::user()->mypage;
		if ($mypage === null) {
			$mypage = new Mypage;
			$mypage->user_id = $user->id;
		}
		$mypage->self_info = $request->self_info;
		$mypage->sex       = $request->sex;
		$mypage->area      = $request->area;
		$mypage->tel       = $request->tel;
		$mypage->twitter   = $request->twitter;
		$mypage->save();
		$mypage->genre()->sync($request->genre);
		return redirect()->route('mypage')->with('success', 'マイページ編集完了');
	}

	public function edit()
	{
		$user = Auth::user();
		$mypage = $user->mypage;
		$mypage_genres = $mypage->genre;
		$mypage_genre_ids = [];
		foreach ($mypage_genres as $k => $v) {
			$mypage_genre_ids[] = $v["id"];
		}
		// dd($mypage_genre_ids);
		$prefectures = config('pref');
		$genres = Genre::all();
		return view('mypage.edit', compact('user', 'mypage', 'prefectures', 'genres', 'mypage_genre_ids'));
	}

}
