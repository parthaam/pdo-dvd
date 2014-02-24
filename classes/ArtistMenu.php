<?php

class ArtistMenu {
	private	$artists;
	private $name;

	function __construct($name, $artists) {
		$this->name = $name;
		$this->artists = $artists;
	}	

	function __toString() {
		$formatArtists = "<select name='" . $this->name . "'>";
		$size = count($this->artists);
		$firstName = $this->artists[0]["artist_name"];
		for ($i = 0; $i < $size; $i++) {
			$value = $i + 1;
			$artistName = $this->artists[$i]["artist_name"];
    		$formatArtists = $formatArtists . "<option value='" . $value. "'>" . $artistName . "</option>";
		}
		$formatArtists = $formatArtists . "</select>";
		return $formatArtists;
	}
}

?>
