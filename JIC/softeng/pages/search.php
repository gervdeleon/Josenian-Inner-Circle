<?php
session_start();

require_once "../Controller/AccountInfo.php";
require_once "../Controller/AccountController.php";
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new AccountController('localhost', 'jic', 3306, 'root', '');
$results="";
if (isset($_POST['search'])){
    $searchkey = $_POST['searchkey'];
	$result=$account->searchUser($searchkey);
	header('Location:../../pages/searchresults.php?result='.$result);
}
// echo $_POST['searchkey'];



// $results=$account->searchUser($);
// echo $results;
	
	

?>