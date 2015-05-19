<?php
class Function{
protected $connection;


public function __construct (PDO $connection){

	$this->connection = $connection;
}
public function LoginUser($idnum, $password){
	try{

		$query = $this->connection->prepare('SELECT idnum, password from user where idnum= ?');
		$query->bindParam(1, $idnum);
		$query->execute();

		$row = $query->fetch(PDO::FETCH_ASSOC);
		$hashpassword = $row['password'];
		$query = null;
		if(password_verify($password, $hashpassword)){
			echo "SUCCESS";
			 
                header('location:../index.php');
		}
		else{
			echo "INVALID.";
		}
		// echo $hashpassword;

	}
	catch(PDOException $ex){
		return $ex->getMessage();

	}

}
public function addUser($idnum,$username,  $password,$firstname,$lastname,  $department,$contactnum,$emailadd,  $address){
	try{

		$query = $this->connection->prepare('INSERT into user (idnum, username , password, firstname, lastname,department,contactnum,emailadd,address) values (?, ?, ?)');
		$query->execute(array($idnum,$username, password_hash($password, PASSWORD_DEFAULT),$firstname,$lastname,$department,$contactnum,$emailadd,$address));
		$query = null;
		return "success";

	}
	catch(PDOException $ex){


	}
	}




}
?>