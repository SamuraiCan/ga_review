<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// トップページ
Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

// レビューページ
Route::get('/review/unapproved', [Controllers\ReviewController::class, 'unapproved'])
	->name('review.unapproved');
Route::post('/review/approval_change', [Controllers\ReviewController::class, 'approval_change'])
	->name('review.approval_change');
Route::post('/review/like_change', [Controllers\ReviewController::class, 'like_change'])
	->name('review.like_change');
Route::resource('review', Controllers\ReviewController::class);

// ゲームタイトルページ
Route::post('/game/like_change', [Controllers\GameController::class, 'like_change'])
	->name('game.like_change');
Route::resource('game', Controllers\GameController::class);

// 検索ページ
Route::get('/search/index', [Controllers\SearchController::class, 'index'])->name('search.index');
// Route::resource('search', Controllers\SearchController::class);

// ジェットストリーム管理画面
Route::middleware([
	'auth:sanctum',
	config('jetstream.auth_session'),
	'verified'
])->group(function () {
});

// 管理者グループ
Route::group(['middleware' => ['auth', 'can:admin']], function () {
	Route::get('/admin', [Controllers\AdminController::class, 'index'])->name('admin');
});

// メンバーグループ
Route::group(['middleware' => ['auth', 'can:member']], function () {
	Route::get('/mypage', [Controllers\MypageController::class, 'index'])->name('mypage');
	Route::get('/mypage/edit', [Controllers\MypageController::class, 'edit'])->name('mypage.edit');
	Route::put('/mypage', [Controllers\MypageController::class, 'update'])->name('mypage.update');
	Route::post('/mypage', [Controllers\MypageController::class, 'store'])->name('mypage.store');
	Route::get('/mypage/withdrawal', [Controllers\MypageController::class, 'withdrawal'])->name('mypage.withdrawal');
	Route::delete('/user/{user}', [Controllers\MypageController::class, 'destroy'])->name('user.destroy');
	Route::get('/review/edit', [Controllers\ReviewController::class, 'edit'])->name('review.edit');
	Route::get('/review/create', [Controllers\ReviewController::class, 'create'])->name('review.create');
	Route::put('/review', [Controllers\ReviewController::class, 'update'])->name('review.update');
	Route::post('/review', [Controllers\ReviewController::class, 'store'])->name('review.store');
});

// メール送信テスト用
Route::get('/mail', [Controllers\MailSendController::class, 'index']);
