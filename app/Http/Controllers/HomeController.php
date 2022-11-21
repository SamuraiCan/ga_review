<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
	public function index()
	{
		if( Gate::allows('admin') ){
			// 管理者だけの処理になる
		}
		if( Gate::denies('read') ){
			// 閲覧者以外の処理になる
		}
		$games_new       = Game::where('is_new', true)->get();
		$games_attention = Game::where('is_attention', true)->get();
		$games_recommend = Game::where('is_recommend', true)->get();
		return view('home.index', compact('games_new', 'games_attention', 'games_recommend'));
	}

}
