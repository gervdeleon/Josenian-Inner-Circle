<?php 
session_start();
date_default_timezone_set("Asia/Manila");
require_once "../Controller/AccountInfo.php";
require_once "../Controller/AccountController.php";
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));


if (isset($_POST['userThoughtsBtn'])) {
	$result = $account->storePosts($_SESSION['idnum'], date("Y-m-d H:i:s"), $_POST['userThoughts'], "Posted", null);
} elseif (isset($_POST['shareQuestionBtn'])) {
	$result = $account->storePosts($_SESSION['idnum'], date("Y-m-d H:i:s"), $_POST['userThoughts'], "Shared a question", $_POST['postSource']);
} elseif (isset($_POST['eventBtn'])) {
	$result = $account->storePosts($_SESSION['idnum'], date("Y-m-d H:i:s"), $_POST['userThoughts'], "Shared an event", $_POST['postSource']);
} elseif (isset($_POST['announcementBtn'])) {
	$result = $account->storePosts($_SESSION['idnum'], date("Y-m-d H:i:s"), $_POST['userThoughts'], "Shared an announcement", $_POST['postSource']);
} else {
	return;
}

if($result != 0){
	echo "<script>";
	echo "alert('Status successfully posted!');";
	echo "location.href = '../../pages/wall.php';";
	echo "</script>";
} else {
	echo "<script>";
	echo "alert('Something went wrong. Please try again.');";
	echo "</script>";

}
?>