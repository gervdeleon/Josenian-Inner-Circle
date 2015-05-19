<?php
require_once("dbConfig.php");
require_once("function.php");

$conn = new PDO(HOST, USER, PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$login = new Login($conn);
$register = new Register($conn);

$msg = '';





if(isset($_POST['register'])){

	$idnum= $_POST['idnum'];
	$username= $_POST['username'];
	$password = $_POST['password'];
	$firstname= $_POST['firstname'];
	$lastname= $_POST['lastname'];
	$department = $_POST['department'];
	$contactnum= $_POST['contactnum'];
	$emailadd= $_POST['emailadd'];
	$address = $_POST['address'];


	$register->addUser($idnum,  $username, $password,$firstname,  $lastname, $department,$contactnum,  $emailadd, $address);

}

if(isset($_POST['login'])){
	$username = $_POST['idnum'];
	$password = $_POST['password'];


	$msg=$login->LoginUser($idnum, $password);
   



}






?>
