<?php

class YelpController extends BaseController {

	public function search() {
		$yelpQuery = DB::table('restaurants')->select('id', 'restaurant_name', 'type', 'city', 'facebook_page');
    	$restaurants = $yelpQuery->get();
		return View::make('yelp/search', [
			'restaurants' => $restaurants,
		]);
	}

	public function reviews($id) {
		$reviewQuery = DB::table('reviews')
							->join('restaurants', 'restaurant_id', '=', 'restaurants.id')
							->select('restaurants.facebook_page', 'review_description', 'rating')->where('restaurant_id', $id);
		$reviews = $reviewQuery->get();
		$checkin = '';
		$likes = '';
		if ($reviews && $reviews[0]->facebook_page) {
			$endpoint = 'https://graph.facebook.com/' . $reviews[0]->facebook_page;
	   	 	$json = file_get_contents($endpoint);
	    	$decode = json_decode($json, true);
	    	$checkin = $decode['checkins'];
	    	$likes = $decode['likes'];
		} else if (!$reviews) {
			$yelpQuery = DB::table('restaurants')->select('id', 'restaurant_name', 'type', 'city', 'facebook_page')->where('id', $id);
    		$restaurants = $yelpQuery->get();
    		$endpoint = 'https://graph.facebook.com/' . $restaurants[0]->facebook_page;
	   	 	$json = file_get_contents($endpoint);
	    	$decode = json_decode($json, true);
	    	$checkin = $decode['checkins'];
	    	$likes = $decode['likes'];
		}
		return View::make('yelp/reviews', [
			'reviews' => $reviews,
			'checkins' => $checkin,
			'likes' => $likes
		]);
	}
}