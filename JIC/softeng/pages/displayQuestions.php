
<?php


require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/JIC/softeng/Controller/AccountInfo.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/JIC/softeng/Controller/AccountController.php');
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
    echo "<form action='' method='post'>";

    echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#answerModal".$row['questionNumber']."' name='answerM'>Answer";
    echo "</button>";
    echo "<button type='button' class='btn btn-danger' name='viewAnswers' data-target='#viewAllAnswers".$row['questionNumber']."' data-toggle='modal'>View Answers";
    echo "</button>";
    echo "<button type='button' class='btn btn-default'>Share";
    echo "</button>";
    echo "</form>";
    echo "</div>";

    echo "<div class='modal fade' id='answerModal".$row['questionNumber']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";

    echo "<div class='modal-dialog'>";
    echo "<div class='modal-content'>";
    echo "<div class='modal-header'>";
    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
    echo "<h4 class='modal-title' id='myModalLabel'>Answer</h4>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "<form action='../softeng/pages/storeAnswers.php?dept=".$_GET['dept']."&num=".$row['questionNumber']."' method='post'>"; 
    echo "<fieldset class='col-md-12'>";
    echo "<textarea name='answer' id='answer' placeholder='Answer Question...'></textarea>";
    echo "</fieldset>";
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<button type='submit' class='btn btn-primary' name='answers'> 
    Submit Answer</button>";
    echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    $answers = $account->displayAnswers($_GET['dept'], $row['questionNumber']);
  echo "<div class='modal fade' id='viewAllAnswers".$row['questionNumber']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
  echo "<div class='modal-dialog'>";
  echo "<div class='modal-content'>";
 if($answers!=null){
  foreach($answers as $ans){
    echo "<div class='modal-header'>";
    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
    echo "<h4 class='modal-title' id='myModalLabel'>";
    echo $ans['idnum'];
    echo "</h4>";
    echo "</div>";
        if($_GET['dept'] == 'CICCT'){
        echo "<div class='modal-body' style='background-color:#ea786b; color:#ffffff;'>";
        }
        elseif ($_GET['dept'] == 'CAS') {
        echo "<div class='modal-body' style='background-color:#f6dd77; color:#ffffff;'>";
        }
        elseif ($_GET['dept'] == 'COE'){
        echo "<div class='modal-body' style='background-color:#30c3a6; color:#ffffff;'>"; 
        }
        elseif ($_GET['dept'] == 'COC'){
        echo "<div class='modal-body' style='background-color:#3cb670; color:#ffffff;'>"; 
        }
        elseif ($_GET['dept'] == 'COENGG'){
        echo "<div class='modal-body' style='background-color:#e88b38; color:#ffffff;'>"; 
        }
        elseif ($_GET['dept'] == 'LAW'){
        echo "<div class='modal-body' style='background-color:#48a2df; color:#ffffff;'>"; 
        }
        else{
        echo "<div class='modal-body'>"; 
        }
    echo $ans['answerContent'];
    echo "</div>";
    echo "<div class='modal-footer col-md-offset-8'>";
    echo "<table><tr><td>";
    echo "<form action='../softeng/pages/likeAnswer.php?dept=".$_GET['dept']."&ansID=".$ans['answerNumber']."' method='post'>";
    echo "<input type='submit' class='btn btn-primary' name='like' value='Like'><span class='badge'>".$ans['numberLikes']."</span>";
    echo "</form>";
    echo "</td><td>";
    echo "<form action='../softeng/pages/dislikeAnswer.php?dept=".$_GET['dept']."&ansID=".$ans['answerNumber']."' method='post'>";
    echo "<input type='submit' class='btn btn-danger' name='dislike' value='Dislike'><span class='badge'>".$ans['numberDislike']."</span>";
    echo "</form>"; 
    echo "</td></tr></table>";     
    echo "</div>";

        }
    }
    else{
    echo "<div class='modal-header'>";
    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
    echo "<h4 class='modal-title' id='myModalLabel'>Answer</h4>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "<p>There are currently no answers.</p>";
    echo "</div>";

    }
  echo "</div>";
  echo "</div>";
  echo "</div>";
    

  }
}
else{
    echo "There are currently no questions in this department!";
}


// foreach($result as $row){
   
   

    // echo "<div class='modal fade' id='answerModal".$row['questionNumber']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
    //   echo "<div class='modal-dialog'>";
    //     echo "<div class='modal-content'>";
    //       echo "<div class='modal-header'>";
    //         echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
    //         echo "<h4 class='modal-title' id='myModalLabel'>Answer".$_GET['qnum']."</h4>";
    //       echo "</div>";
    //       echo "<div class='modal-body'>";
    //         echo "<form action='#' method='post'>"; 
    //          echo "<fieldset class='col-md-12'>";
    //           echo "<input type='hidden' name='qNumber' value='".$row['questionNumber']."'>";
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


//}



?>