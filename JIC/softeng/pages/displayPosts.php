<?php 
date_default_timezone_set("Asia/Manila");
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/AccountInfo.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/AccountController.php');
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

$result = $account->displayPosts($_SESSION['idnum']);

if ($result) {
	foreach ($result as $row) {
		echo "<tr><td>";
		echo "<p style='font-size:8pt;'>".$row['statusType']." on ".date("F j, Y h:i A", strtotime($row['statusDate']))."</p>";
		if (strtolower($row['statusType']) == 'shared a question' || strtolower($row['statusType']) == 'shared an event' || strtolower($row['statusType']) == 'shared an announcement') {
			$html = "<div style='font-size: 10pt; padding: 15px; border: 1px solid #eee'><div style='font-size: 8pt;'><strong>".$row['postSource']."</strong></div>";
		} elseif (strtolower($row['statusType']) == 'posted'){
			$html = "<div style='font-size: 11pt;''>";
		}
		echo $html."<p>".$row['statusContent']."</p></div>";
		echo "</td></tr>";
	}
}

?>