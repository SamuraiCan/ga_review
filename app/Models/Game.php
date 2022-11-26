<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Game extends Model
{
  use HasFactory;

  /**
   * モデルと関連しているテーブル
   *
   * @var string
   */
  protected $table = 'games';

  public function reviews()
  {
    return $this->hasMany(Review::class);
  }

  public function devices()
  {
    return $this->belongsToMany(Device::class)->withTimestamps();
  }

  public function genres()
  {
    return $this->belongsToMany(Genre::class)->withTimestamps();
  }

  public function likes()
  {
    return $this->hasMany(GameLike::class);
  }

  public function image()
  {
    return $this->hasMany(Image::class);
  }

  public function is_like() : bool
	{
    if (!Auth::check()) return false;
		$user = Auth::user()->id;
		$count = $this->likes->where('user_id', $user)->count();
		return $count > 0 ? true : false;
	}
}
