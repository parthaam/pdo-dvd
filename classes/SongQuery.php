<?php

class SongQuery {

  	private $pdo;
  	private $artist;
  	private $genre;
  	private $order;

	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	function all() {
		$query = "select songs.title, artists.artist_name, genres.genre, songs.price from songs
					inner join artists on songs.artist_id = artists.id
					inner join genres on songs.genre_id = genres.id;";
		$statement = $this->pdo->prepare($query);
    	$statement->execute();
    	return $statement->fetchAll();
	}
}

?>