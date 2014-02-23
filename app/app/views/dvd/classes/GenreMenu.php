<?php

class GenreMenu {
	private	$genres;
	private $name;

	function __construct($name, $genres) {
		$this->name = $name;
		$this->genres = $genres;
	}	

	function getDropDown() {
		$formatGenres = "<select name='" . $this->name . "'>";
		$size = count($this->genres);
		foreach ($genres as $genre) {
			$value = $i + 1;
    		$formatGenres = $formatGenres . "<option value='" . $value . "'>" . $genre->genre_name . "</option>";
		}
		$formatGenres = $formatGenres . "</select>";
		return $formatGenres;
	}
}

?>
