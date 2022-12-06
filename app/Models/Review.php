<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
	use HasFactory;

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function game()
	{
		return $this->belongsTo(Game::class);
	}

	public function device()
	{
		return $this->belongsToMany(Device::class);
	}

	public function approval()
	{
		return $this::where('is_approval', true)->get();
	}

	public function unapproved()
	{
		return $this::where('is_approval', false)->get();
	}

	public function likes()
	{
		return $this->hasMany(ReviewLike::class);
	}

	public function is_like() : bool
	{
    if (!Auth::check()) return false;
		$user = Auth::user()->id;
		$count = $this->likes->where('user_id', $user)->count();
		return $count > 0 ? true : false;
	}
}
