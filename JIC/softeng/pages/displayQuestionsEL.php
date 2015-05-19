<?php

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/AccountInfo.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/AccountController.php');
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

$result = $account->displayQuestions($_GET['dept']);

if($result != NULL){
foreach($result as $row){
    echo "<h4>";
    echo $row['firstname']." ".$row['lastname'];
    echo "</h4>";
    echo "<div class='modal-body'>";
    echo $row['questionContent'];
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<div class='float: right; right: 30px;'>";
    echo "<button type='button' class='btn btn-primary' data-target='#answerModal' name='answerM' value='".$row['questionNumber']."'>Answer";
    echo "</button>";
    echo "<button type='button' class='btn btn-danger' name='viewAnswers' data-target='#viewAllAnswers' data-toggle='modal'>View Answers";
    echo "</button>";
    echo "</div>";
    echo "<form name='shareQuestionForm' action='../softeng/pages/postWall.php' onsubmit='return confirmShareQuestion()' method='post'>
          <input type='submit' name='shareQuestionBtn' value='Share' class='btn btn-default'>
          <input type='hidden' name='userThoughts' value='".$row['questionContent']."'>
          <input type='hidden' name='postSource' value='".$row['firstname']." ".$row['lastname']."'></form>";
    echo "</div>";
  }
}
else{
    echo "There are currently no questions in this department!";
}


// foreach($result as $row){
   

// echo "<div class='modal fade' id='answerModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
//   echo "<div class='modal-dialog'>";
//     echo "<div class='modal-content'>";
//       echo "<div class='modal-header'>";
//         echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
//         echo "<h4 class='modal-title' id='myModalLabel'>Answer</h4>";
//       echo "</div>";
//       echo "<div class='modal-body'>";
//         echo "<form action='#' method='post'>"; 
//          echo "<fieldset class='col-md-12'>";
//             echo "<textarea name='answer' id='answer' placeholder='Answer Question...'></textarea>";
//             echo "</fieldset>";
//       echo "</form>";
//       echo "</div>";
//       echo "<div class='modal-footer'>";
//         echo "<button type='button' class='btn btn-primary'> 
//         Submit Answer</button>";
//       echo "</div>";
//     echo "</div>";
//   echo "</div>";
// echo "</div>";
// }

?>