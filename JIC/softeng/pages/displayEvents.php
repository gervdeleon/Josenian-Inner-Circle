<?php

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/AccountInfo.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/AccountController.php');
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

$events = $account->displayEvents($_GET['dept']);
if($events != null){
  foreach($events as $row){
    echo "<div class='modal-header'>";
    echo "<h4 class='modal-title' id='myModalLabel'><strong>";
    echo $row['eventName'];
    echo "</strong></h4>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "<div></div>";
    echo $row['eventContent'];
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<form name='shareForm' action='../softeng/pages/postWall.php' onsubmit='return confirmShareEvent()' method='post'>
          <input type='submit' name='eventBtn' value='Share' class='btn btn-default'>
          <input type='hidden' name='userThoughts' value='".$row['eventContent']."'>
          <input type='hidden' name='postSource' value='".$row['eventName']."'></form>";
    echo "</div>";

  }
  echo "</div>";
  echo "</div>";
  echo "</div>";
}
else{
    echo "There are no events to be displayed!";
}

?>