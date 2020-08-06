<?php

// https://www.php.net/manual/en/book.pdo.php
// https://www.php.net/manual/en/pdo.constants.php
// https://www.php.net/manual/en/pdostatement.bindvalue.php
// https://www.php.net/manual/en/pdostatement.fetchobject.php

namespace application\models;

class User extends \core\Model {
	
	public function createTable() {
		$sql = "CREATE TABLE IF NOT EXISTS users (user_id CHAR(36) PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, created DATETIME NOT NULL DEFAULT NOW())";
		static::getDB()->exec($sql);
	}
	
	public function create($firstname, $lastname) {
		$result = false;
		
		if (!empty($firstname) && !empty($lastname)) {
			$generated_id = $this->uuid();
			$st = static::getDB()->prepare("INSERT INTO users (user_id, firstname, lastname) VALUES (:user_id, :firstname, :lastname)");
			$st->bindValue(':user_id', $generated_id, \PDO::PARAM_STR);
			$st->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
			$st->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
			$result = $st->execute();
		}
		
		if ($result) {
			$result = $generated_id;
		}
		
		return $result;
	}
	
	public function readLatest($limit) {
		$users = [];
		
		$st = static::getDB()->prepare("SELECT * FROM users ORDER BY created DESC LIMIT :limit");
		$st->bindValue(':limit', $limit, \PDO::PARAM_INT);
		$execution_result = $st->execute();

		while($user = $st->fetchObject()) {
			$users[] = $user;
		}

		return $users;
	}
}
