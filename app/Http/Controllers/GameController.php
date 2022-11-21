<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Device;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GameController extends Controller
{
	public function __construct(Game $game, Genre $genre, Device $device)
	{
		$this->game    = $game;
		$this->genre   = $genre;
    $this->device  = $device;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$games = Game::all();
		return view('game.index', compact('games'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $device_all = $this->device->get();
			$features   = config('feature');
      $genres     = $this->genre->get();
      return view('game.create', compact('device_all', 'features', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //タイトル情報で入力されたデータを保存
    public function store(Request $request)
    {
      $validated = $request->validate([
        'title' => 'required|unique:games|max:255',
        'description' => 'max:16384',
      ]);
      $game               = new Game();
      $game->title        = $request->input('title');
      $game->description  = $request->input('description');
      $game->release_date = $request->input('release_date');
      $game->players      = $request->input('players');
      $game->offical_url  = $request->input('offical_url');
      $game->agency       = $request->input('agency');
      $categories         = empty($request->input('categories')) ? [] : $request->input('categories');
      $game->is_new       = in_array(1, $categories);
      $game->is_attention = in_array(2, $categories);
      $game->is_recommend = in_array(3, $categories);
      $game->save();
      $game->devices()->sync($request->devices);
      $game->genres()->sync($request->genres);
      $imgs = $request->file('image');
      if (isset($imgs)) {
        foreach ($imgs as $img) {
          $img_name = $img->getClientOriginalName();
          $path = $img->storeAs('public', $img_name);
          if ($path) {
            Image::create([
              'game_id' => $game->id,
              'image_path' => $path,
            ]);
          }
        }
      }
      return redirect()->route('game.show', $game->id)->with('status', '登録完了');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $game    = $this->game->find($id);
      $devices = $game->devices;
      $genres  = $game->genres;
      $reviews = $game->reviews;
      $score = count($reviews) > 0 ? Helper::score_avg($reviews) : 0;
      $chart = count($reviews) > 0 ? Helper::chart_avg($reviews) : [];
      $images = $game->image;
      // dd($images);
      return view('game.show', compact(
        'game',
        'devices',
        'genres',
        'reviews',
        'score',
        'chart',
        'images'
      ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $game         = $this->game->find($id);
      $devices      = $game->devices;
      $device_all   = $this->device->get();
      $genres       = $game->genres;
      $genre_all    = $this->genre->get();
      $features     = [$game->is_new, $game->is_attention, $game->is_recommend];
			$feature_all = config('feature');
      $reviews      = $game->reviews;
      $score        = count($reviews) > 0 ? Helper::score_avg($reviews) : 0;
      $chart        = count($reviews) > 0 ? Helper::chart_avg($reviews) : [];
      $images       = $game->image;
      return view('game.edit', compact(
        'game',
        'devices',
        'device_all',
        'genres',
        'genre_all',
        'features',
        'feature_all',
        'reviews',
        'score',
        'chart',
        'images'
      ));
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
      $validated = $request->validate([
        'title' => [
          'required',
          'max:255',
          Rule::unique('games')->ignore($id)
        ],
        'description' => 'max:16384',
      ]);
      $game               = $this->game::find($id);
      $game->title        = $request->input('title');
      $game->description  = $request->input('description');
      $game->release_date = $request->input('release_date');
      $game->players      = $request->input('players');
      $game->offical_url  = $request->input('offical_url');
      $game->agency       = $request->input('agency');
      $categories         = empty($request->input('categories')) ? [] : $request->input('categories');
      $game->is_new       = in_array(1, $categories);
      $game->is_attention = in_array(2, $categories);
      $game->is_recommend = in_array(3, $categories);
      $game->save();
      $game->devices()->sync($request->input('devices'));
      $game->genres()->sync($request->input('genres'));
      if ($request->input('del_images')) {
        foreach ($request->input('del_images') as $del_id) {
          $del_path = Image::find($del_id)->image_path;
          Image::destroy($del_id);
          Storage::delete($del_path);
        }
      }
      $imgs = $request->file('image');
      if (isset($imgs)) {
        foreach ($imgs as $img) {
          $img_name = $img->getClientOriginalName();
          $path = $img->storeAs('public', $img_name);
          if ($path) {
            Image::create([
              'game_id' => $game->id,
              'image_path' => $path,
            ]);
          }
        }
      }
      return redirect()->route('game.show', $id)->with('status', '編集完了');
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
}
