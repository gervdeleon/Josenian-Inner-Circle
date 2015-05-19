<?php 

session_start();

require_once "../Controller/AccountInfo.php";
require_once "../Controller/AccountController.php";
use controller\AccountController as AccountController;

$account = new AccountController('localhost', 'jic', 3306, 'root', '');

$id = $_SESSION['idnum'];
$account->displayinnercircle($id);
header('Location:../../pages/innercircle.php');

?>