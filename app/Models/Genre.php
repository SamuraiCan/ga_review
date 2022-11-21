<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function mypage()
    {
      return $this->belongsToMany(Mypage::class);
    }

    public function game()
    {
      return $this->belongsToMany(Game::class);
    }
}
