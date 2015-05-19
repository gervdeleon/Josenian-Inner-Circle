<?php 
session_start();
date_default_timezone_set("Asia/Manila");
require_once "../controller/MessageInfo.php";
require_once "../controller/MessageController.php";
use controller\MessageInfo as Message;
use controller\MessageController as MessageController;

$message = new Message(new MessageController('localhost', 'jic', 3306, 'root', ''));

if (isset($_POST['sendMessage'])) {
	$result = $message->sendMessage($_POST['subject'], $_POST['recipient'], $_SESSION['idnum'], date("Y-m-d H:i:s"), $_POST['messageBody']);

	if (is_integer($result)) {
		echo "<script>";
		echo "alert('Message Sent!');";
		echo "location.href='../../pages/messaging.php';";
		echo "</script>";
	} else {
		echo "<script>";
		echo "alert('Something went wrong. Please try again.');";
		echo "</script>";
	}
}
?>