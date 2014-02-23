<?php

class RatingQuery {

  	private $pdo;

	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	function getAll() {
		$query = "select rating_name from ratings";
		$statement = $this->pdo->prepare($query);
    	$statement->execute();
    	return $statement->fetchAll();
	}
}

?>