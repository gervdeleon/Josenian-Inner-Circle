<?php 

session_start();

require_once "../Controller/AccountInfo.php";
require_once "../Controller/AccountController.php";
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

if ($_GET['dept'] == $_SESSION['department'] && isset($_POST['createEvent'])) {
	if ($account->storeEvents($_POST['eventName'], $_POST['eventDescription'], $_GET['dept'], $_POST['eventDate'], $_POST['eventTime'], $_SESSION['idnum']) > 0) {
		echo "<script>";
		echo "alert('Event succesfully posted!');";
		echo "location.href='../../pages/events.php?dept=".$_GET['dept']."';";
		echo "</script>";
	} else {
		echo "<script>";
		echo "alert('Something went wrong.\nPlease try again.');";
		echo "</script>";
	}
} else {
	echo "<script>";
	echo "alert('You are not allowed to post events in this department.');";
	echo "location.href='../../pages/events.php?dept=".$_GET['dept']."';";
	echo "</script>";
}


?>