<?php

namespace Itp;

class FacebookApi {
	
	public static function getResults($name) {
		$endpoint = 'graph.facebook.com/'. $name;
    	$json = file_get_contents($endpoint);
    	return json_decode($json);
	}
}