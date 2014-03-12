<?php

namespace Itp\FacebookApi;

class FacebookApi {
	protected $id;

	function __construct($id_) {
		$this->id = $id_;
	}
	public static function get() {
		$endpoint = 'graph.facebook.com/'. $id;
    	$json = file_get_contents($endpoint);
    	return json_decode($json);
	}
}