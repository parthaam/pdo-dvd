<?php

class Song {

	private $id;
	private $title;
	private $artistId;
	private $genreId;
	private $price;

	private $pdo;

	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	function setTitle($title) {
		$this->title = $title;
	}

	function getTitle() {
		return $this->title;
	}

	function setArtistId($artistId) {
		$this->artistId = $artistId;
	}

	function setGenreId($genreId) {
		$this->genreId = $genreId;
	}

	function setPrice($price) {
		$this->price = $price;
	}

	function getId(){
		return $this->id;
	}

	function save() {
		$query = "insert into songs (title, artist_id, genre_id, price) values (?, ?, ?, ?)";
		$statement = $this->pdo->prepare($query);
		$statement->bindParam(1, $this->title);
		$statement->bindParam(2, $this->artistId);
		$statement->bindParam(3, $this->genreId);
		$statement->bindParam(4, $this->price);
    	$success = $statement->execute();
    	$this->id = $this->pdo->lastInsertId();
    	return $success;
	}
}

?>

<?php
