<?php
class Login{
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
			 
                header('location:home.php');
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
}





?>