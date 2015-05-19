<?php 

session_start();

require_once "../Controller/AccountInfo.php";
require_once "../Controller/AccountController.php";
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

if (isset($_POST['answers'])) {
		if ($account->storeAnswers($_POST['answer'], $_GET['dept'], 
		$_SESSION['idnum'], $_GET['num']) > 0){
		header('Location: ../../pages/departments.php?dept='.$_GET['dept']);
		exit;
		
	}
}
?>