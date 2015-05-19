<?php 

session_start();

require_once "../Controller/AccountInfo.php";
require_once "../Controller/AccountController.php";
use controller\AccountController as AccountController;

$account = new AccountController('localhost', 'jic', 3306, 'root', '');

$id=$_GET['id'];
$loggedin=$_GET['loggedin'];
$result = $account->addtoinnercircle($id,$loggedin);
header('Location: ../../pages/profile.php?id='.$_SESSION['idnum'].'&loggedin='.$loggedin);
// echo $result;

?>