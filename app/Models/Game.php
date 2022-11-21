<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
  public function image()
  {
    return $this->hasMany(Image::class);
  }
}
