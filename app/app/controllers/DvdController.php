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
}