<?php

class ArtistQuery {

  	private $pdo;

	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	function getAll() {
		$query = "select artist_name from artists";
		$statement = $this->pdo->prepare($query);
    	$statement->execute();
    	return $statement->fetchAll();
	}
}

?>