<?php
/**
 * Created by PhpStorm.
 * User: davidtang
 * Date: 2/11/14
 * Time: 5:57 PM
 */

class Dvd extends Eloquent {

  public function genre() {
    return $this->belongsTo('genre');
  }

  public function format() {
    return $this->belongsTo('Rating');
  }

  public function label() {
    return $this->belongsTo('label');
  }

  public function rating() {
    return $this->belongsTo('rating');
  }

  public function sound() {
    return $this->belongsTo('sound');
  }

  public static function validate($title, $ratingId, $genreId)
  {
    $validation = Validator::make([
      'title' => $title,
      'ratings' => $ratingId,
      'genres' => $genreId
    ], [
    'title' => 'required|min:3',
    'ratings' => 'required|numeric',
    'genres' => 'required|numeric'
    ]);
    return $validation;
  }

  public static function search($title, $ratingId, $genreId) {
    $query = DB::table('dvds')
      ->select('title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name', 'release_date')
      ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
      ->join('labels', 'labels.id', '=', 'dvds.label_id')
      ->join('genres', 'genres.id', '=', 'dvds.genre_id')
      ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
      ->join('formats', 'formats.id', '=', 'dvds.format_id')
      ->take(30);

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