<?php
/**
 * Created by PhpStorm.
 * User: davidtang
 * Date: 2/11/14
 * Time: 5:57 PM
 */

class Dvd {

  public static function search($title, $ratingId, $genreId) {
    $query = DB::table('dvds')
      ->select('title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name', 'release_date')
      ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
      ->join('labels', 'labels.id', '=', 'dvds.label_id')
      ->join('genres', 'genres.id', '=', 'dvds.genre_id')
      ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
      ->join('formats', 'formats.id', '=', 'dvds.format_id');

      if ($title) {
         $query->where('title', 'LIKE', "%$title%");
      }

      if ($ratingId != 'All') {
         $query->where('ratings.id', $ratingId);
      }

      if ($genreId != 'All') {
        $query->where('genres.id', $genreId);
      }

    $dvds = $query->get();

    return $dvds;
  }
} 