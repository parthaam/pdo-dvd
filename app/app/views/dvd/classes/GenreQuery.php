<?php

class GenreQuery {
	private $pdo;

	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	function getAll() {
		$query = "select genre_name from genres";
		$statement = $this->pdo->prepare($query);
    	$statement->execute();
    	return $statement->fetchAll();
	}
}

?>

<?php
