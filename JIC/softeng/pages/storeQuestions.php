<?php 

session_start();

require_once "../Controller/AccountInfo.php";
require_once "../Controller/AccountController.php";
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

if ($_GET['dept'] == $_SESSION['department']) {
	if (isset($_POST['ask'])) {
		if ($account->storeQuestions($_POST['question'], $_GET['dept'], $_SESSION['idnum']) > 0){
			echo "<script>";
			echo "alert('Question successfully posted!');";
			echo "window.location.href='../../pages/departments.php?dept=".$_GET['dept']."'";
			echo "</script>";
		}
	}	
} else {
	echo "<script>";
	echo "alert('You are not allowed to ask questions in this department.');";
	echo "window.location.href='../../pages/departments.php?dept=".$_GET['dept']."'";
	echo "</script>";
}

?>