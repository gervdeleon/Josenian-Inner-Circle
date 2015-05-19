<?php
class Register{
public function __construct (PDO $connection){

	$this->connection = $connection;
}
public function addUser($idnum,$username,  $password,$firstname,$lastname,  $department,$contactnum,$emailadd,  $address){
	try{

		$query = $this->connection->prepare('INSERT into user (idnum, username , password, firstname, lastname,department,contactnum,emailadd,address) values (?, ?, ?,?,?,?,?,?,?)');
		$query->execute(array($idnum,$username, password_hash($password, PASSWORD_DEFAULT),$firstname,$lastname,$department,$contactnum,$emailadd,$address));
		$query = null;
		return "success";

	}
	catch(PDOException $ex){


	}
	}

}
?>