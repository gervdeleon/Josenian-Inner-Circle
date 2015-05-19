<?php

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/AccountInfo.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/AccountController.php');
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

$announcements = $account->displayAnnouncements($_GET['dept']);
if($announcements!=null){
  foreach($announcements as $row){
    echo "<div class='modal-header'>";
    echo "<h4 class='modal-title' id='myModalLabel'>";
    echo $row['announcementName'];
    echo "</h4>";
    echo "</br>";
    echo $row['announcementDate'];
    echo "</div>";
    echo "<div class='modal-body'>";
    echo $row['announcementContent'];
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<form name='shareAnnouncementForm' action='../softeng/pages/postWall.php' onsubmit='return confirmAnnouncement()' method='post'>
          <input type='submit' name='announcementBtn' value='Share' class='btn btn-default'>
          <input type='hidden' name='userThoughts' value='".$row['announcementContent']."'>
          <input type='hidden' name='postSource' value='".$row['announcementName']."'></form>";
    echo "</div>";

  }

  echo "</div>";
  echo "</div>";
  echo "</div>";
}  
else{
    echo "No Announcements to be displayed!";
  }
?>