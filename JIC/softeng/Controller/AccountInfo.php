<?php 

namespace controller;

class AccountInfo{

	private $connection;

	public function __construct(AccountController $connection){
		$this->connection = $connection;
	}

	public function register($idnum, $username, $password, $firstname, $lastname, $department, $contactnum, $emailadd, $address){
		$userTempInfo = array($idnum, $username, $password, $firstname, $lastname, $department, $contactnum, $emailadd, $address);

		return $this->connection->register($userTempInfo);
	}

	public function login($idnum, $password){
		$userInfo = array($idnum, $password);
		return $this->connection->login($userInfo);
	}

	public function displayQuestions($department){
		$questionInfo = array($department);
		return $this->connection->displayQuestions($questionInfo);
	}

	public function storeQuestions($questionContent, $department, $idnum){
		$ask = array(0, $questionContent, $department, $idnum);
		return $this->connection->storeQuestions($ask);
	}

	public function displayStudents($department){
		$studentInfo = array($department);
		return $this->connection->displayStudents($studentInfo);
	}

	public function storeAnswers($answerContent, $department, $idnum, $questionNumber){
		$answerInfo = array(0, $answerContent, $department, $idnum, $questionNumber);
		return $this->connection->storeAnswers($answerInfo);
	}
	public function searchUser($lastname,$firstname){
		$searchkey=array($lastname,$firstname);
		return $this->connection->searchUser($searchkey);

	}
	public function displayAnswers($department, $questionNumber){
		$viewAnswers = array($department, $questionNumber);
		return $this->connection->displayAnswers($viewAnswers);
	}
	
	public function displayEvents($department){
		$events = array($department);
		return $this->connection->displayEvents($events);
	}

	public function displayAnnouncements($department){
		$announcements = array($department);
		return $this->connection->displayAnnouncements($announcements);
	}

	public function storePosts($id, $date, $content, $type, $source){
		$post = array(0, $date, $content, $id, $type, $source);
		$result = $this->connection->storePosts($post);
		return $result;
	}

	public function displayPosts($id){
		$post = array($id);
		$result = $this->connection->displayPosts($post);
		return $result;
	}

	public function displayFiles($idnum) {
		$fileInfo = array($idnum);
		return $this->connection->displayFiles($fileInfo);
	}

	public function uploadFiles($idnum,$name,$mime,$size, $target){
		$files=array(0, $idnum,$name,$mime,$size, $target);
		return $this->connection->uploadFiles($files);
	}

	public function storeAnnouncements($announcementName, $announcementContent, $department, $announcementDate, $idnum){
		$announcementInfo = array(0, $announcementName, $announcementContent, $department, $announcementDate, $idnum);
		return $this->connection->storeAnnouncements($announcementInfo);
	}

	public function countLike($answerNumber){
		$answerInfo = array($answerNumber);
		return $this->connection->countLike($answerInfo);
	}

	public function countDislike($answerNumber){
		$answerInfo = array($answerNumber);
		return $this->connection->countDislike($answerInfo);
	}

	public function storeEvents($eventName, $eventContent, $department, $eventDate, $eventTime, $idnum){
		$eventInfo = array(0, $eventName, $eventContent, $department, $eventDate, $eventTime, $idnum);
		return $this->connection->storeEvents($eventInfo);
	}

	public function displayUsers(){
		$users = $this->connection->displayUsers();
		return $users;
	}

}

?>