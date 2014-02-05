<?php

class GenreMenu {
	private	$genres;
	private $name;

	function __construct($name, $genres) {
		$this->name = $name;
		$this->genres = $genres;
	}	

	function __toString() {
		$formatGenres = "<select name='" . $this->name . "'>";
		$size = count($this->genres);
		for ($i = 0; $i < $size; $i++) {
			$value = $i + 1;
    		$genreName = $this->genres[$i]["genre"];
    		$formatGenres = $formatGenres . "<option value='" . $value . "'>" . $genreName . "</option>";
		}
		$formatGenres = $formatGenres . "</select>";
		return $formatGenres;
	}
}

?>
