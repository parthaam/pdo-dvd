<?php

class RatingMenu {
	private	$ratings;
	private $name;

	function __construct($name, $ratings) {
		$this->name = $name;
		$this->ratings = $ratings;
	}	

	function getDropDown() {
		$formatRatings = "<select name='" . $this->name . "'>";
		$size = count($this->ratings);
		// $firstName = $this->ratings[0]["rating_name"];
		foreach ($ratings as $rating) {
			$value = $i + 1;
    		$formatRatings = $formatRatings . "<option value='" . $value. "'>" . $rating->rating_name . "</option>";
		}
		$formatRatings = $formatRatings . "</select>";
		return $formatRatings;
	}
}

?>
