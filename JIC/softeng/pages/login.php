<?php 

session_start();

require_once "../Controller/AccountInfo.php";
require_once "../Controller/AccountController.php";
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

if (isset($_POST['login'])) {
	$password = sha1($_POST['pword']);
	$_SESSION=$account->login($_POST['idNum'], $password);
	
	if ($_SESSION != null) {
		header('Location: ../../index.php');
		exit;
	} else {
		header('Location: ../index.php');
		exit;
	}
}
?>