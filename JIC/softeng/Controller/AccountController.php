<?php 

namespace controller;

require_once "IAccountController.php";
use PDO;

class AccountController{

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

	//DE LEON, GERVIN
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


	//DELA ROSA, FRETE

	public function addtoinnercircle($id, $loggedin){
		try{
			
			$q2 = $this->connection->prepare('SELECT count(*) from innercircle where friendID = ? and userID = ?');
			$q2->execute(array($id, $loggedin));
			$r2 = $q2->fetchColumn();
			if ($r2==0){
				$status = 0;	
				$query = $this->connection->prepare('INSERT into innercircle (userID, friendID, status) values (?,?,?)');
				$query->bindParam(1, $loggedin);
				$query->bindParam(2, $id);
				$query->bindParam(3, $status);
				$query->execute();
				$query = null;

				header('Location:../../pages/profile.php?id='.$loggedin);
			}
			else{
				$result = "alert('Friend already in the inner circle')";	
				return $result;
			}
			

		}
		catch(PDOException $ex){
			return $e->getMessage();
		}
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

	//ELLE, ELLANA RIA
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

	public function displayUsers(){
		try {
			$query = "SELECT * FROM user";
			$result = $this->connection->query($query);
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
		return $result;
	}

	//GOZON, STEPHANIE NICOLE

	public function displayAnswers(array $viewAnswers){
		try{
			$query="SELECT * FROM answers inner join user where answers.idnum=user.idnum and answers.department=? and answers.questionNumber=? ORDER by questionNumber desc;";
			$this->statement=$this->connection->prepare($query);
			$this->statement->execute($viewAnswers);
			$view=$this->statement->fetchAll(PDO::FETCH_ASSOC);

		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
		return $view;
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

	//JOLBOT, TRIZTINE LEO

	public function countLike($answerNumber){
		try {
			$query = $this->connection->prepare('UPDATE answers set numberLikes = numberLikes + 1 WHERE answerNumber= ?');
			$query->bindParam(1, $answerNumber);
			//$this->connection->prepare($query);
			// $query->execute(array($answerNumber));
			$query->execute();
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
	}

	public function countDislike($answerNumber){
		try {
			$query = "UPDATE answers set numberDislike = numberDislike + '1' WHERE answerNumber= ? ";
			$this->connection->prepare($query);
			// $query->execute();
		} catch (PDOException $e) {
			$result = $e->getMessage();
		}
	}

	//RUZ, JOHN TIMOTHY
	public function displayQuestions(array $questionInfo){
		try {
			$query = "SELECT * FROM questions inner join user WHERE questions.idnum = user.idnum AND questions.department=? ORDER BY questionNumber DESC;";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($questionInfo);
			$question = $this->statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $question;
	}

	public function displayEvents(array $eventInfo){
		try {
			$query = "SELECT * FROM events inner join user WHERE events.idnum = user.idnum AND events.department=? ORDER BY eventNumber asc;";
			$this->statement = $this->connection->prepare($query);
			$this->statement->execute($eventInfo);
			$events = $this->statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $events;
	}

	// -------------------------------------------------------------------------------------------------------------

	

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

	public function checkinnercircle($id, $loggedin){
		try{
			
			$q2 = $this->connection->prepare('SELECT count(*) from innercircle where friendID = ? and userID = ?');
			$q2->execute(array($id, $loggedin));
			$r2 = $q2->fetchColumn();
			if ($r2==0){	
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

	public function acceptUser($id, $loggedin){
		try{
			$status=1;
			$query = $this->connection->prepare('UPDATE innercircle SET status= ? where userID = ? and friendID = ?');
			$query->bindParam(1, $status);
			$query->bindParam(2, $id);
			$query->bindParam(3, $loggedin);
			$query->execute();

			$query2 = $this->connection->prepare('INSERT into innercircle (userID, friendID, status) values (?,?,?)');
			$query2->bindParam(1, $loggedin);
			$query2->bindParam(2, $id);
			$query2->bindParam(3, $status);
			$query2->execute();
			$query2 = null;
			header('Location:../../pages/profile.php?id='.$loggedin);
		}
		catch(PDOException $ex){
			return $e->getMessage();
		}
	}

	public function rejectUser($id, $loggedin){
		try{
			$status=0;
			$query = $this->connection->prepare('DELETE from innercircle where (userID = ? or friendID= ?) and (friendID = ?  or userID = ?) and status = ?');
			$query->bindParam(1, $id);
			$query->bindParam(2, $id);
			$query->bindParam(3, $loggedin);
			$query->bindParam(4, $loggedin);
			$query->bindParam(5, $status);
			$query->execute();
			header('Location:../../pages/profile.php?id='.$loggedin);
		}
		catch(PDOException $ex){
			return $e->getMessage();	

		}
	}

	
	

	
}
?>