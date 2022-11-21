<?php

namespace App\Helpers;

class Helper
{
  public static function chart_avg($reviews) : array
  {
    $graphic = 0;
    $volume  = 0;
    $sound   = 0;
    $story   = 0;
    $comfort = 0;
    foreach ($reviews as $k => $v) {
      $graphic += $v->graphic;
      $volume  += $v->volume;
      $sound   += $v->sound;
      $story   += $v->story;
      $comfort += $v->comfort;
    }
    $count = count($reviews);
    $chart = [
      'id'      => $v->id . "_avg",
      'graphic' => $graphic / $count,
      'volume'  => $volume / $count,
      'sound'   => $sound / $count,
      'story'   => $story / $count,
      'comfort' => $comfort / $count,
    ];
    return $chart;
  }

  public static function chart($review) : array
  {
    $chart = [
      'id'      => $review->id,
      'graphic' => $review->graphic,
      'volume'  => $review->volume,
      'sound'   => $review->sound,
      'story'   => $review->story,
      'comfort' => $review->comfort,
    ];
    return $chart;
  }

  public static function score_avg($reviews) : float
  {
    $score = 0;
    foreach ($reviews as $k => $v) {
      $score += $v->score;
    }
    $count = count($reviews);
    $score = $score / $count;
    return $score;
  }
}
