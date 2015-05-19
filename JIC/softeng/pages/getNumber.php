<?php 

session_start();

// require_once "../Controller/AccountInfo.php";
// require_once "../Controller/AccountController.php";
// use controller\AccountInfo as Account;
// use controller\AccountController as AccountController;

// $account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

if (isset($_POST['answerM'])) {
		$num=$_GET['answerM'];
		header('Location: ../../pages/ask.php?answerM='.$num.'&dept='
			.$_GET['dept']);
		exit;
	}
?>