<?php
session_start();

require_once "../softeng/Controller/AccountInfo.php";
require_once "../softeng/Controller/AccountController.php";
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));


if(isset($_POST['uploaded']))
{
	$userid=$_SESSION['idnum'];
	$name=$_FILES['uploaded']['name'];
	$mime=$_FILES['uploaded']['type'];
	$size=intval($_FILES['uploaded']['size']);
	$target="upload/".$userid."_";
	$target=$target . basename($_FILES['uploaded']['name']);
	$result=$account->uploadFiles($userid,$name,$mime,$size, $target);

	if($result>0)
	{		
		

		move_uploaded_file($_FILES['uploaded']['tmp_name'],$target);

		echo "<script>alert('The file " . basename($_FILES['uploaded']['name']). " has been uploaded');";
		echo "location.href='uploadfiles.php';</script>";

	}
	else{
		echo "Error! Failed to insert the file"."<pre>{$account->error}</pre>";
	}
}
else{
	echo "<script>alert('An error occured while the file was being uploaded.');";
}
?>


