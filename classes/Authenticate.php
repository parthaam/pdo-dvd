<?php

class Authenticate {

  	private $pdo;
  	private $username;
  	private $email;

	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	function authenticate($username, $password) {
		$query = "select * from users where username = ? and password = sha1(?)";
		$statement = $this->pdo->prepare($query);
		$statement->bindParam(1, $username);
		$statement->bindParam(2, $password);
		$statement->execute();
		$user = $statement->fetchAll();
		if ($user) {
			$username = $user[0]['username'];
			$this->email = $user[0]['email'];
			return true;
		}
		return false;
	}

	function getUsername() {
		return $username;
	}

	function getEmail() {
		return $this->email;
	}
}

?>