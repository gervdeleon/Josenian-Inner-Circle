<?php 

namespace controller;

class MessageInfo{
	private $connection;

	public function __construct(MessageController $connection){
		$this->connection = $connection;
	}

	public function displayInbox($id){
		$messageInfo = array($id);
		$result = $this->connection->displayInbox($messageInfo);
		return $result;
	}

	public function displayDrafts($id){
		$draftInfo = array($id, 'DRAFT');
		$result = $this->connection->displayDrafts($draftInfo);
		return $result;
	}

	public function saveDrafts($subject, $recipient, $sender, $dateTime, $messageBody){
		$message = array(0, $subject, $recipient, $sender, NULL, $dateTime, $messageBody, 'DRAFT');
		$result = $this->connection->saveDrafts($message);
		return $result;
	}

	public function displaySent($id){
		$sentInfo = array($id);
		$result = $this->connection->displaySent($sentInfo);
		return $result;
	}

	public function sendMessage($subject, $recipient, $sender, $dateTime, $messageBody){
		$message = array(0, $subject, $recipient, $sender, $dateTime, $messageBody, NULL);
		$result = $this->connection->sendMessage($message);
		return $result;
	}

	public function countInbox($id){		
		$query = array ($id);
		$result = $this->connection->countInbox($query);
		return $result;
	}

	public function countSent($id){
		$query = array($id);
		$result = $this->connection->countSent($query);
		return $result;
	}

	public function displayMessage($msgNo, $type){
		if ($type == '1') {
			$query = "SELECT * FROM messages, user WHERE messages.sender = user.idnum AND msgNo = ?";	
		} elseif ($type == '0') {
			$query = "SELECT * FROM messages, user WHERE messages.recipient = user.idnum AND msgNo = ?";
		}
		$messageInfo = array($msgNo);
		$result = $this->connection->displayMessage($messageInfo, $query);
		return $result;
	}
}



?>