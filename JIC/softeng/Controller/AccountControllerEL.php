<?php 

namespace controller;

require_once "IAccountController.php";
use PDO;

class AccountController implements IAccountController{

	private $statement;
	private $connection;

	public function __construct($host, $dbname, $port, $user, $pass){
		try {
			$this->connection = new PDO("mysql:host=$host;dbname=$dbname;port=$port",$user,$pass);
		}
		catch (PDOException $e)   
		{
			echo $e->getMessage();
		}
	}
	public function register(array $tempUserInfo){
		try{
			$query = "INSERT INTO user VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($tempUserInfo);
			$result = $this->statement->rowCount();
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		return $result;
	}

	public function login(array $loginCredentials){
		try {
			$query = "SELECT * FROM user WHERE idnum = ? and password= ?;";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($loginCredentials);
			$user = $this->statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $user;
	}

	public function displayQuestions(array $questionInfo){
		try {
			$query = "SELECT * FROM questions, user WHERE questions.idnum = user.idnum AND questions.department=? ORDER BY questionNumber DESC;";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($questionInfo);
			$question = $this->statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $question;
	}


	public function storeQuestions(array $ask){
		try{
			$query = "INSERT INTO questions VALUES (?, ?, ?, ?);";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($ask);
			$result = $this->statement->rowCount();
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		return $result;
	}

	public function displayStudents(array $studentInfo){
		try {
			$query = "SELECT * FROM user WHERE department=?;";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($studentInfo);
			$question = $this->statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $question;
	}

	public function storeAnswers(array $answerInfo){
		try{
			$query = "INSERT INTO answers VALUES (?, ?, ?, ?, ?);";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($answerInfo);
			$result = $this->statement->rowCount();
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		return $result;
	}

	public function storeEvents(array $eventInfo){
		try{
			$query = "INSERT INTO events VALUES (?, ?, ?, ?, ?, ?, ?);";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($eventInfo);
			$result = $this->statement->rowCount();
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		return $result;
	}

	public function storeAnnouncements(array $announcementInfo){
		try{
			$query = "INSERT INTO announcements VALUES (?, ?, ?, ?, ?, ?);";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($announcementInfo);
			$result = $this->statement->rowCount();
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		return $result;
	}

	public function displayEvents(array $events){
		try {
			$query = "SELECT * FROM events WHERE department=?;";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($events);
			$events = $this->statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $events;
	}

	public function displayAnnouncements(array $announcements){
		try {
			$query = "SELECT * FROM announcements WHERE department=?;";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($announcements);
			$announcements = $this->statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $announcements;
	}

	public function displayAnswers(){
		try {
			$query = "SELECT * FROM answers;";
			$view = $this->connection->query($query);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $view;
	}

	public function searchUser($searchkey){
		try{
			$keyword= $searchkey.'%';
			$query=$this->connection->prepare('SELECT lastname,firstname from user where lastname like ? or firstname like ?');

			$query->execute(array($keyword,$keyword));
			$result=$query->fetchAll(PDO::FETCH_ASSOC);
			$query=null;
			return $result;
		}catch(PDOException $e){
			return $e->getMessage();
		}
		
	}
	public function addtoinnercircle($id, $loggedin){
		try{

			$q2 = $this->connection->prepare('SELECT count(*) from innercircle where friendID = ? and userID = ?');
			$q2->execute(array($id, $loggedin));
			$r2 = $q2->fetchColumn();
			if ($r2==0){	
				$query = $this->connection->prepare('INSERT into innercircle (userID, friendID) values (?,?)');
				$query->bindParam(1, $loggedin);
				$query->bindParam(2, $id);
				$query->execute();
				$query = null;

        // $result = "alert('Added to Inner Circle');"
        // return $result;
			}
			else{
				$result = "alert('Friend already in the inner circle');";
				return $result;
			}


		}
		catch(PDOException $ex){
			return $e->getMessage();
		}
	}


	public function checkinnercircle($id, $loggedin){
		try{

			$q2 = $this->connection->prepare('SELECT count(*) from innercircle where friendID = ? and userID = ?');
			$q2->execute(array($id, $loggedin));
			$r2 = $q2->fetchColumn();
			if ($r2==0){	
        // $query = $this->connection->prepare('INSERT into innercircle (userID, friendID) values (?,?)');
        // $query->bindParam(1, $loggedin);
        // $query->bindParam(2, $id);
        // $query->execute();
        // $query = null;

        // $result = "alert('Added to Inner Circle');"
        // return $result;
				$result = 1;
				return $result;
			}
			else{
				$result = 0;
				return $result;
			}


		}
		catch(PDOException $ex){
			return $e->getMessage();
		}
	}

	public function displayUsers(){
		try {
			$query = "SELECT * FROM user";
			$result = $this->connection->query($query);
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
		return $result;
	}

	public function storePosts(array $post){
		try {
			$query = "INSERT INTO STATUS VALUES (?, ?, ?, ?, ?, ?);";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($post);
			$result = $this->statement->rowCount();			
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
		return $result;
	}

	public function displayPosts(array $post){
		try {
			$query = "SELECT * FROM status WHERE studentID = ? ORDER BY statusID DESC";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($post);
			$result = $this->statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
		return $result;
	}


	public function displayFiles(array $fileInfo){
		try {
			$query = "SELECT * FROM file WHERE idnum = ?;";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($fileInfo);
			$fileInfo= $this->statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $fileInfo;


	}

	public function uploadFiles(array $files){
		try{
			$query = "INSERT INTO file VALUES (?, ?, ?, ?, ?, ?);";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($files);
			$result = $this->statement->rowCount();
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		return $result;
	}

}


?>