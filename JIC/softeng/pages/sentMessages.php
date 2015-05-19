<?php 
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/MessageInfo.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/MessageController.php');
use controller\MessageInfo as Message;
use controller\MessageController as MessageController;

$message = new Message(new MessageController('localhost', 'jic', 3306, 'root', ''));

$messages = $message->displaySent($_SESSION['idnum']);

if ($messages) {
	$value = 0;
	foreach($messages as $row) {
		$date = date("F j, Y h:i:s A", strtotime($row['dateTime']));
		echo "<tr class='clickable-row' data-href='../softeng/pages/message.php?id=".$row['msgNo']."&type=0'>";
		echo "<td><input type='checkbox' name='$date'></td>";
		echo "<td>$date</td>";
		echo "<td>".$row['subject']."</td>";
		echo "<td>".$row['firstname']." ".$row['lastname']."</td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "<h3>No messages to display.</h3>";
}
?>