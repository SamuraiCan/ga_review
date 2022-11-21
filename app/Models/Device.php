<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
  use HasFactory;

      /**
   * モデルと関連しているテーブル
   *
   * @var string
   */
  protected $table = 'devices';


  public function games()
  {
    return $this->belongsToMany(Game::class)->withTimestamps();
  }

}
