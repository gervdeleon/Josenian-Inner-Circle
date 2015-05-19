<?php 

session_start();

require_once "../Controller/AccountInfo.php";
require_once "../Controller/AccountController.php";
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

if (isset($_POST['register'])) {
	$password = sha1($_POST['password']);
	if ($account->register($_POST['idnum'], $_POST['username'],  $password, $_POST['firstname'], $_POST['lastname'], $_POST['department'], $_POST['contactnum'], $_POST['emailadd'], $_POST['address']) > 0){
		header('Location: ../index.php');
		exit;
	}
}
?>