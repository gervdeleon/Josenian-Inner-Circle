<?php 

namespace controller;

interface IMessageController{
	public function displayInbox(array $messageInfo);
	public function displayDrafts(array $draftInfo);
	public function saveDrafts(array $draftMessage);
	public function displaySent(array $sentInfo);
	public function sendMessage(array $message);
}

?>