<?php
session_start();
?>
<!DOCTYPE html>
<html class="no-js">

<head>
  <meta charset="utf-8">
  <title>Josenian Inner Circle</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <!-- Bootstrap Stylesheet -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap.css">

  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="../css/font-awesome.min.css">

  <!-- Google Font -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Normailize Stylesheet -->
  <link rel="stylesheet" href="../css/normalize.min.css">

  <!-- Main Styles -->
  <link rel="stylesheet" href="../css/templatemo_style.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">


  <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
  <script src="../js/vendor/jquery-1.10.1.min.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/jquery.gmap3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/plugins.js"></script>
  <script src="../js/validator.js"></script>


</head>
<body>

  <header class="site-header" id="top">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="row">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#main-menu">
              <span class="sr-only">Toggle navigation</span>
              <i class="fa fa-bars"></i>
            </button>
            <div class="logo-wrapper">
              <a class="navbar-brand" href="#">
                <img src="../logos/JIC3.png">
                <span class="logo-s"></span>
              </a>
            </div>  
          </div>
          <div class="collapse navbar-collapse" id="main-menu">
            <ul class="nav navbar-nav navbar-right">
              <span class="nav-s"></span>
              <li><a href="../index.php">Home</a></li>
              <!-- <li><a href="#product-inner">Products</a></li> -->
              <li><a href="profile.php?id=<?php echo $_SESSION['idnum']?>">Profile</a>
              </li>
              <li><a href="#mod">Questions</a></li>
              <li><a href="../softeng/index.php">Logout</a></li>
            </ul>
          </div>
        </div> 
      </div>
    </nav>
  </header>

  <div class="top-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="image-holder">
            <img src="../logos/JIC2.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <h4>JOSENIAN INNER CIRCLE</h4>
          <h1>
            WELCOME 
            <?php
            echo $_GET['dept']." Student";
            ?>
          </h1>

        </div>
      </div>
    </div>
  </div>


  <div class="container qbuttons" style="z-index: 99999">
    <div class="row">
      <div class="col-md-6">
       <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="width:500px; margin-left:20px;" id="mod" name="question"> View Questions from this Department</button> 
     </div>
     <div class="col-md-6">
       <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#studentModal" style="width:500px;">View Students from this Department</button> 
     </div>
   </div>

   <div class="row">
     <div class="col-md-6">
       <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#createEventModal" style="width:500px; margin-left:20px;">Create an Event</button>
     </div>
     <div class="col-md-6">
       <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#makeAnnouncementsModal" style="width:500px;">Make Announcements</button>
     </div>
   </div>

   <div class="row">
     <div class="col-md-6">
       <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#viewEventsModal" style="width:500px; margin-left:20px;">View Events for this Department</button>
     </div>
     <div class="col-md-6">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#viewAnnouncementsModal" style="width:500px;">View Announcements from this Department</button> 
    </div>
  </div>
</div>  


<?php

require_once '../softeng/Controller/AccountInfo.php';
require_once '../softeng/Controller/AccountController.php';
use controller\AccountInfo as Account;
use controller\AccountController as AccountController;

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

$result = $account->displayQuestions($_GET['dept']);
// var_dump($result);
if($result != null){
  echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
  echo "<div class=''>";
  echo "<div class='modal-content'>";
  foreach($result as $row){
    echo "<div class='modal-header'>";
    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
    echo "<h4 class='modal-title' id='myModalLabel'>";
      // echo "question id: ".$row['questionNumber'];
    echo "</br>";
    echo $row['firstname']." ".$row['lastname'];
    echo "</h4>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo $row['questionContent'];
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<form action='../softeng/pages/postWall.php' name='questionForm1' method='post' onsubmit='return confirmShare()' >";;
    echo "<input type='hidden' name='userThoughts' value='".$row['questionContent']."'>";
    echo "<input type='hidden' name='postType' value='Shared'>";
    echo "<input type='hidden' name='postSource' value='".$row['firstname']." ".$row['lastname']."'>";
    echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#answerModal".$row['questionNumber']."' name='answerM'>Answer</button>";
    echo "<button type='button' class='btn btn-danger' name='viewAnswers' data-target='#viewAllAnswers".$row['questionNumber']."' data-toggle='modal'>View Answers";
    echo "</button>";
    echo "<input type='submit' class='btn btn-default' name='questionBtn' value='Share'>";
    echo "</form>";
    echo "</div>";
      // var_dump($_POST['answerM']);
      //   if(isset($_POST['answerM'])){
      //   $selected_val=$_POST['answerM'];
      //   var_dump($selected_val);
      // }
    $num=$row['questionNumber'];

  }
  echo "</div>";
  echo "</div>";
  echo "</div>";


  foreach($result as $row){
    echo "<div class='modal fade' id='answerModal".$row['questionNumber']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
    echo "<div class='modal-dialog'>";
    echo "<div class='modal-content'>";
    echo "<div class='modal-header'>";
    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
    echo "<h4 class='modal-title' id='myModalLabel'>Answer</h4>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "<form action='../softeng/pages/storeAnswers.php?dept=".$_GET['dept']."' method='post'>"; 
    echo "<fieldset class='col-md-12'>";
    echo "<input type='hidden' name='qNumber' value='".$row['questionNumber']."'>";
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
  }

  $answers = $account->displayAnswers();
  if($answers != null){
    echo "<div class='modal fade' id='viewAllAnswers".$row['questionNumber']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
    echo "<div class='modal-dialog'>";
    echo "<div class='modal-content'>";

    foreach($answers as $row){
      if ($row['question']) {
        # code...
      }
      echo "<div class='modal-header'>";
      echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
      echo "<h4 class='modal-title' id='myModalLabel'>";
      echo $row['idnum'];
      echo "</h4>";
      echo "</div>";
      echo "<div class='modal-body'>";
      echo $row['answerContent'];
      echo "</div>";
      echo "<div class='modal-footer'>";
      echo "</div>";

    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
}
else{
  $num=0;
  echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
  echo "<div class='modal-dialog'>";
  echo "<div class='modal-content'>";
  echo "<div class='modal-header'>";
  echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
  echo "<h4 class='modal-title' id='myModalLabel'>";
  echo "</br>";
  echo $_GET['dept'];
  echo "</h4>";
  echo "</div>";
  echo "<div class='modal-body'>";
  echo "No available questions.";
  echo "</div>";
  echo "<div class='modal-footer'>";
  echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
  echo "</div>";
  echo "</div>";
  echo "</div>";
  echo "</div>";
}

// echo "<div class='modal fade' id='answerModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
// echo "<div class='modal-dialog'>";
// echo "<div class='modal-content'>";
// echo "<div class='modal-header'>";
// echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
// echo "<h4 class='modal-title' id='myModalLabel'>Answer</h4>";
// echo "</div>";
// echo "<div class='modal-body'>";
// echo "<form action='../softeng/pages/storeAnswers.php?num=".$num."&dept=".$_GET['dept']."' method='post'>"; 
// echo "<fieldset class='col-md-12'>";
// echo "<input type='hidden' name='qNumber' value='".$row['questionNumber']."'>";
// echo "<textarea name='answer' id='answer' placeholder='Answer Question...'></textarea>";
// echo "</fieldset>";

// echo "</div>";
// echo "<div class='modal-footer'>";
// echo "<button type='submit' class='btn btn-primary' name='answers'> 
// Submit Answer</button>";
// echo "</div>";
// echo "</form>";
// echo "</div>";
// echo "</div>";
// echo "</div>";

// $answers = $account->displayAnswers($num);
// if($answers != null){
//   echo "<div class='modal fade' id='viewAllAnswers' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
//   echo "<div class='modal-dialog'>";
//   echo "<div class='modal-content'>";

//   foreach($answers as $row){
//     echo "<div class='modal-header'>";
//     echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
//     echo "<h4 class='modal-title' id='myModalLabel'>";
//     echo $row['idnum'];
//     echo "</h4>";
//     echo "</div>";
//     echo "<div class='modal-body'>";
//     echo $row['answerContent'];
//     echo "</div>";
//     echo "<div class='modal-footer'>";
//     echo "</div>";

//   }
//   echo "</div>";
//   echo "</div>";
//   echo "</div>";
// }

echo "<div class='modal fade' id='createEventModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
echo "<div class='modal-dialog'>";
echo "<div class='modal-content'>";
echo "<div class='modal-header'>";
echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
echo "<h3 class='modal-title' id='myModalLabel'><strong>Create an Event</strong></h3>";
echo "</div>";
echo "<div class='modal-body'>";
echo "<form name='eventForm' action='../softeng/pages/storeEvents.php?dept=".$_GET['dept']."' method='post' onsubmit='return confirmEvent()'>"; 
echo "<div class='row'><fieldset class='col-md-12'>";
echo "<input type='text' name='eventName' id='eventN' placeholder='Event Name' required style='margin-bottom: 10px;'>";
echo "</fieldset></div>";
echo "<div class='row'><div class='col-md-12'>Event Date and Time: </div><fieldset class='col-md-6'>";
echo "<input type='date' name='eventDate' id='eventD' placeholder='Event Date' required style='margin-bottom: 10px;'> ";
echo "</fieldset>";
echo "<fieldset class='col-md-6'>";
echo "<input type='time' name='eventTime' id='eventT' placeholder='Event Time' required style='margin-bottom: 10px;'>";
echo "</fieldset></div>";
echo "<div class='row'><fieldset class='col-md-12'>";
echo "<textarea name='eventDescription' id='eventDesc' placeholder='Event Description...' required></textarea>";
echo "</fieldset></div>";

echo "</div>";
echo "<div class='modal-footer'>";
echo "<button type='submit' class='btn btn-primary' name='createEvent'> 
Create Event</button>";
echo "</div>";
echo "</form>";
echo "</div>";
echo "</div>";
echo "</div>";

echo "<div class='modal fade' id='makeAnnouncementsModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
echo "<div class='modal-dialog'>";
echo "<div class='modal-content'>";
echo "<div class='modal-header'>";
echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
echo "<h4 class='modal-title' id='myModalLabel'>Create an Announcement</h4>";
echo "</div>";
echo "<div class='modal-body'>";
echo "<form action='../softeng/pages/storeAnnouncements.php?dept=".$_GET['dept']."' method='post'>"; 
echo "<fieldset class='col-md-12'>";
echo "<input type='text' name='announcementName' id='announcemenN' placeholder='Announcement Name'>";
echo "</fieldset>";
echo "<fieldset class='col-md-12'>";
echo "<input type='date' name='announcementDate' id='announcemenD' placeholder='Announcement Date'>";
echo "</fieldset>";
echo "<fieldset class='col-md-12'>";
echo "<textarea name='announcementDescription' id='announcementDesc' placeholder='Announcement Description...'></textarea>";
echo "</fieldset>";

echo "</div>";
echo "<div class='modal-footer'>";
echo "<button type='submit' class='btn btn-primary' name='createAnnouncement'> 
Create Announcement</button>";
echo "</div>";
echo "</form>";
echo "</div>";
echo "</div>";
echo "</div>";

$events = $account->displayEvents($_GET['dept']);
if($events != null){
  echo "<div class='modal fade' id='viewEventsModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
  echo "<div class='modal-dialog'>";
  echo "<div class='modal-content'>";
  echo "<div class='modal-header'>";
  echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
  echo "<h3 class='modal-title' id='myModalLabel'><strong>Events for ".$_GET['dept']."</strong></h3>";
  echo "</div>";

  foreach($events as $row){
    echo "<div class='modal-header'>";
    echo "<h4 class='modal-title' id='myModalLabel'>";
    echo $row['eventName'];
    echo "</h4>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo $row['eventContent'];
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "</div>";

  }
  echo "</div>";
  echo "</div>";
  echo "</div>";
}


$announcements = $account->displayAnnouncements($_GET['dept']);
if($announcements!=null){
  echo "<div class='modal fade' id='viewAnnouncementsModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
  echo "<div class='modal-dialog'>";
  echo "<div class='modal-content'>";

  foreach($announcements as $row){
    echo "<div class='modal-header'>";
    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
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
    echo "</div>";

  }
  echo "</div>";
  echo "</div>";
  echo "</div>";
}
?>

<?php

require_once '../softeng/Controller/AccountInfo.php';
require_once '../softeng/Controller/AccountController.php';

$account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));

$result = $account->displayStudents($_GET['dept']);
if($result != null){
  echo "<div class='modal fade' id='studentModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
  echo "<div class='modal-dialog'>";
  echo "<div class='modal-content'>";
  foreach($result as $row){

    echo "<div class='modal-header'>";
    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
    echo "<h4 class='modal-title' id='myModalLabel'>";
    echo $row['username'];
    echo "</h4>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo $row['firstname']." ".$row['lastname'];
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<button type='button' class='btn btn-primary'>Visit Profile</button>";
    echo "</div>";

  }
  echo "</div>";
  echo "</div>";
  echo "</div>";
}
?>

<div id="lightbox">   
  <form name="questionForm" action="../softeng/pages/storeQuestions.php?dept=<?php echo $_GET['dept']; ?>" onsubmit="return confirmQuestion()" method="post">
<!--         <div class="lightbox-close">  
-->
<div class="row">
 <fieldset class="col-md-10">
  <textarea name="question" id="question" placeholder="Ask Question..." style="max-height: 50px;" required></textarea>
</fieldset>
<fieldset class="col-lg-2">
  <button type="submit" class="btn btn-primary btn-lg" name="ask" style="margin-top: 0px;">
    Ask Question

  </fieldset> 
</div>

<!--         </div> -->           </form>
</div>


<br><br><br><br><br><br>
<div id="bottom-section">
  <div class="container" id="promotion">
    <div class="row">
      <div class="col-md-6">
        <div class="right-one">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-4">

      </div>
    </div>
  </div>
  <div class="container" id="contact">
    <div class="row">
      <div class="col-md-5">
        <div class="contact-form">
          <!-- <h2>CONTACT US</h2> -->
          <span>SEND A MESSAGE</span>
          <form action="#" method="post">
            <div class="row">
              <fieldset class="col-md-6">
                <input type="text" name="name" id="name" placeholder="Name...">
              </fieldset>
              <fieldset class="col-md-6">
                <input type="email" name="email" id="email" placeholder="Email Address...">
              </fieldset>
              <fieldset class="col-md-12">
                <textarea name="message" id="message" placeholder="Message..."></textarea>
              </fieldset>
              <fieldset class="col-md-12">
                <input type="submit" id="button-message" value="Send Message">
              </fieldset>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <p>Copyright © 2015 Josenian Inner Circle| Design: <a href="http://www.templatemo.com">templatemo</a></p>
      </div>
      <div class="col-md-6 col-sm-6">
        <ul class="social">
          <li><a href="#" class="fa fa-facebook"></a></li>
          <li><a href="#" class="fa fa-twitter"></a></li>
          <li><a href="#" class="fa fa-instagram"></a></li>
          <li><a href="#" class="fa fa-google-plus"></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

</body>
</html>