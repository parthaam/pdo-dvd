<?php

class DvdController extends BaseController {
	
	public function search() {

		  $genreQuery = DB::table('genres')->select('id', 'genre_name');
    	$genres = $genreQuery->get();

    	$ratingQuery = DB::table('ratings')->select('id', 'rating_name');
    	$ratings = $ratingQuery->get();

		return View::make('dvd/search', [
			'genres' => $genres,
			'ratings' => $ratings
		]);
	}

	public function listDvds() {

		$title = Input::get('title'); 
   		$ratingId = Input::get('ratings');
   		$genreId = Input::get('genres');

        $dvds = Dvd::search($title, $ratingId, $genreId);

		return View::make('dvd/dvd_list', [
      		'dvds' => $dvds,
    	]);
	}

	function createDvd() {
		$genreQuery = DB::table('genres')->select('id', 'genre_name');
    	$genres = $genreQuery->get();

    	$ratingQuery = DB::table('ratings')->select('id', 'rating_name');
    	$ratings = $ratingQuery->get();

    	$labelQuery = DB::table('labels')->select('id', 'label_name');
    	$labels = $labelQuery->get();

    	$soundQuery = DB::table('sounds')->select('id', 'sound_name');
    	$sounds = $soundQuery->get();

    	$formatQuery = DB::table('formats')->select('id', 'format_name');
    	$formats = $formatQuery->get();

    	return View::make('dvd/create', [
			'genres' => $genres,
			'ratings' => $ratings,
			'labels' => $labels,
			'sounds' => $sounds,
			'formats' => $formats
		]);
	}

	function insertDvd() {
		$title = Input::get('title'); 
 		$ratingId = Input::get('ratings');
 		$genreId = Input::get('genres');
    $labelId = Input::get('labels');
    $soundId = Input::get('sounds');
    $formatId = Input::get('formats');

		$validation = Dvd::validate($title, $ratingId, $genreId);
 		if ($validation->fails()) {
 			return Redirect::to('dvd/create')->with('errors', $validation->messages());
 		}
 		$dvd = new Dvd();
 		$dvd->title = $title;
 		$dvd->genre_id = $genreId;
 		$dvd->rating_id = $ratingId;
 		$dvd->label_id = $labelId;
 		$dvd->sound_id = $soundId;
 		$dvd->format_id = $formatId;
 		$dvd->save();

 		return Redirect::to('dvd/create')->with('success', 'Added DVD!');
	}

  function searchFB() {
    return View::make('searchFacebook', [
    ]);
  }

  function getFacebookIds() {
    $username = Input::get('username');
    // This code is also in the FacebookApi.php class but I had trouble including it.
    $endpoint = 'https://graph.facebook.com/' . $username;
    $json = file_get_contents($endpoint);
    $decode = json_decode($json, true);
    return View::make('facebookId', [
      'username' => $decode['username'],
      'id' => $decode['id']
    ]);
  }
}