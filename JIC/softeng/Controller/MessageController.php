<?php 

namespace controller;
require_once "IMessageController.php";
use PDO;

class MessageController implements IMessageController{
	private $connection;
	private $statement;

	public function __construct($host, $db, $port, $user, $pass){
		try {
			$this->connection = new PDO ("mysql:host=$host;dbname=$db;port=$port",$user, $pass);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function displayInbox(array $messageInfo){
		try {
			$query = "SELECT * FROM messages, user WHERE messages.sender = user.idnum AND recipient = ? ORDER BY msgNO desc";	
			$this->statement =  $this->connection->prepare($query);
			$this->statement->execute($messageInfo);
			$result = $this->statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $result;
	}

	public function displayDrafts(array $draftInfo){
		try {
			$query = "SELECT * FROM messages WHERE sender = ? AND messageType = ? ORDER BY msgNO desc";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($draftInfo);
			$result = $this->statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
		return $result;
	}

	public function saveDrafts(array $draftMessage){
		try {
			$query = "INSERT INTO messages VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($draftMessage);
			$result = $this->statement->rowCount();
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
		return $result;
	}

	public function displaySent(array $sentInfo){
		try {
			$query = "SELECT * FROM messages, user WHERE messages.recipient = user.idnum AND sender = ? ORDER BY msgNO desc";
			$this->statement = $this->connection->prepare($query);
			$result = $this->statement->execute($sentInfo);
			$result = $this->statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
		return $result;
	}

	public function sendMessage(array $message){
		try {
			$query = "INSERT INTO messages VALUES (?, ?, ?, ?, ?, ?, ?);";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($message);
			$result = $this->statement->rowCount();
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
		return $result;
	}

	public function countInbox(array $recipient){		
		try {
			$query = "SELECT count(msgNo) as inboxNo FROM messages WHERE recipient = ?";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($recipient);
			$result = $this->statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
		return $result;
	}

	public function countSent(array $sender){
		try {
			$query = "SELECT count(msgNo) as sentNo FROM messages WHERE sender = ?";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($sender);
			$result = $this->statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
		return $result;
	}

	public function displayMessage($messageInfo, $query){
		try {	
			$this->statement =  $this->connection->prepare($query);
			$this->statement->execute($messageInfo);
			$result = $this->statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
		return $result;
	}
}


?>