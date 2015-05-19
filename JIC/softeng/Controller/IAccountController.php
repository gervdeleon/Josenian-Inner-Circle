<?php 

namespace controller;

interface IAccountController{
	public function register(array $tempUserInfo);
	public function login(array $loginCredentials);
	public function displayQuestions(array $questionInfo);
	public function storeQuestions(array $ask);
	public function displayStudents(array $studentInfo);
	public function storeAnswers(array $answerInfo);
	public function storeEvents(array $eventInfo);
	public function storeAnnouncements(array $announcementInfo);
	public function displayEvents(array $events);
	public function displayAnnouncements(array $announcements);
	// public function displayAnswers(array $viewAnswers);
	public function searchUser($searchkey);
	public function addtoinnercircle($id, $loggedin);
	public function displayUsers();



}

?>