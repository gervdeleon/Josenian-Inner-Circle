<?php 

session_start();

require_once "../Controller/AccountInfo.php";
require_once "../Controller/AccountController.php";
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

if ($_GET['dept'] == $_SESSION['department'] && isset($_POST['createAnnouncement'])) {
		if ($account->storeAnnouncements($_POST['announcementName'], 
			$_POST['announcementDescription'], 
			$_GET['dept'], $_POST['announcementDate'], 
			$_SESSION['idnum']) > 0){
		header('Location: ../../pages/announcements.php?dept='.$_GET['dept']);
		exit;
		
	} else {
		echo "<script>";
		echo "alert('Something went wrong.\nPlease try again.');";
		echo "</script>";
	}
}
else {
	echo "<script>";
	echo "alert('You are not allowed to post announcements in this department.');";
	echo "location.href='../../pages/announcements.php?dept=".$_GET['dept']."';";
	echo "</script>";
}

?>