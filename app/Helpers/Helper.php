<?php

namespace App\Helpers;

class Helper
{
  public static function get_chart_avg($game) : array
  {
    $reviews = $game->reviews;
    if ( count($reviews) === 0 ) return [];
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

  public static function get_score($game) : float
  {
    $reviews = $game->reviews;
    return count($reviews) > 0 ? self::score_avg($reviews) : 0;
  }

  private static function score_avg($reviews) : float
  {
    $score = 0;
    foreach ($reviews as $k => $v) {
      $score += $v->score;
    }
    $count = count($reviews);
    $score = $score / $count;
    return $score;
  }

  public static function get_chart_sex($game) : array
  {
    $reviews = $game->reviews;
    if ( count($reviews) === 0 ) return [];
    $man   = 0;
    $woman = 0;
    $other = 0;
    foreach ($reviews as $k => $v) {
      switch ($v->user->mypage->sex) {
        case 1: $man++; break;
        case 2: $woman++; break;
        default: $other++; break;
      }
    }
    $count = count($reviews);
    $chart = [
      'id'    => $v->id . "_avg_sex",
      'man'   => $man,
      'woman' => $woman,
      'other' => $other,
    ];
    // dd($chart);
    return $chart;
  }

  public static function get_chart_device($game) : array
  {
    $reviews = $game->reviews;
    if ( count($reviews) === 0 ) return [];
    $man   = 0;
    $woman = 0;
    $device_arr = [];
    foreach ($reviews as $k => $v) {
      if ($v->device) {
        foreach ($v->device as $k2 => $v2) {
          $device_arr[] = $v2->name;
        }
      }
    }
    $count = count($reviews);
    $chart = [
      'id'     => $v->id . "_device",
      'values' => array_count_values($device_arr),
    ];
    return $chart;
  }

}
