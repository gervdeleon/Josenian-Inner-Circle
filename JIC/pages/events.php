<?php
session_start();
// $id = $_GET['id'];
// $pdo = new PDO('mysql:host=localhost;dbname=jic', "root", "");
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $query=$pdo->prepare('SELECT * from user where idnum = ?');
// $query->execute(array($id));
// $user = $query->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!-- templatemo 416 xenon -->
<!--
Xenon Template 
http://www.templatemo.com/preview/templatemo_416_xenon
-->
<head>
    <meta charset="utf-8">
    <title>Josenian Inner Circle</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Normailize Stylesheet -->
    <link rel="stylesheet" href="../css/normalize.min.css">

    <!-- Main Styles -->
    <link rel="stylesheet" href="../css/templatemo_style.css">


    <script src="../js/modernizr.custom.js"></script>

    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="../js/validator.js"></script>

</head>
<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <header class="" id="top">
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
                                <img src="../logos/JIC3.png" class="img-responsive">
                                <span class="logo-s"></span>
                            </a>
                        </div>  
                    </div>
                    <div class="collapse navbar-collapse" id="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <span class="nav-s"></span>
                            <li ><a href="../index.php">Home</a></li>
                            <!-- <li><a href="#product-inner">Products</a></li> -->
                            <?php  echo "<li><a href=profile.php?id=".$_SESSION['idnum']."'>PROFILE</a></li>"; ?>
                        </li>
                        <li><a href="../softeng/index.php">LOG OUT</a></li> 
                        <li><div class="pull-right">
                            <?php 
                            echo "<form class='navbar-form' action='searchresults.php' method='post'>";
                            echo "<div class='input-group'>";
                            echo "<input type='text' class='form-control' placeholder='Search' name='searchkey' method='post'>";
                            echo "<div class='input-group-btn'>";
                            echo "<button class='btn btn-default' type='submit' name='search'><i class='glyphicon glyphicon-search'></i></button>";
                            echo "</div>";
                            echo "</div>";
                            echo "</form>";
                            ?>
                        </div>   </li> 
                    </ul>

                </div>
            </div> 
        </div>
    </nav>
</header>





<!--CONTAINER -->
<div class="profile">   

    <!-- CONTENT -->
    <div class="container row">
        <div class="col-md-4 ">
            <div class="col-md-12">
                <div class="circle" align="center">
                    <?php
                    if ($_GET['dept'] == 'CICCT') {
                        echo "<img src='../dept/CICCT.png' align='middle'>";
                    }
                    elseif ($_GET['dept'] == 'COC') {
                        echo "<img src='../dept/Commerce.png' align='middle'>";
                    }
                    elseif ($_GET['dept'] == 'CAS') {
                        echo "<img src='../dept/CAS.png' align='middle'>";
                    }
                    elseif ($_GET['dept'] == 'COENGG') {
                        echo "<img src='../dept/Engineering.png' align='middle'>";
                    }
                    elseif ($_GET['dept'] == 'COE') {
                        echo "<img src='../dept/COE.png' align='middle'>";
                    }
                    else{
                        echo "<img src='../dept/Law.png' align='middle'>";                        
                    }
                    ?>
                </div>
                <div class="sidebar">
                    <div class="mini-submenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>
                    <div class="list-group">
                        <a href="departments.php?dept=<?php echo $_GET['dept']?>" class="list-group-item">
                            <i class="fa fa-question"></i> QUESTIONS
                        </a>
                        <a href="events.php?dept=<?php echo $_GET['dept']?>" class="list-group-item active">
                            <i class="fa fa-pencil"></i> CREATE EVENTS
                        </a>
                        <a href="announcements.php?dept=<?php echo $_GET['dept']?>" class="list-group-item">
                            <i class="fa fa-plus"></i></i> MAKE ANNOUNCEMENTS
                        </a>
                        <a href="viewEvents.php?dept=<?php echo $_GET['dept']?>" class="list-group-item">
                            <i class="fa fa-calendar"></i></i> VIEW EVENTS
                        </a>
                        <a href="viewAnnouncements.php?dept=<?php echo $_GET['dept']?>" class="list-group-item">
                            <i class="fa fa-info"></i> VIEW ANNOUNCEMENTS
                        </a>

                    </div>        
                </div>
            </div>            
        </div>

        <div class="col-md-8">
        	<h3>CREATE EVENT</h3>
         <form onsubmit="return confirmEvent()" action='../softeng/pages/storeEvents.php?dept=<?php echo $_GET['dept']; ?>' method='post' name="eventForm" >
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-12">
                <input type='text' name='eventName' placeholder='Event Name' required> 
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <strong>Event Date and Time:</strong>
              </div>              
          </div>
          <div class="row" style="margin-bottom: 10px;">
           <div class='col-md-6' >
             <input type='date' name='eventDate' id='eventD' placeholder='Event Date' required>
         </div>
         <div class='col-md-6'>
             <input type='time' name='eventTime' id='eventT' placeholder='Event Time' required>
         </div> 
     </div>
     <div class="row" style="margin-bottom: 10px;">
       <div class='col-md-12'>
         <textarea name='eventDescription' id='eventDesc' placeholder='Event Description...' required></textarea>
     </div>
     <div>
         <div class="col-md-12">
             <input type="submit" class="btn btn-info" name="createEvent" value="Create Event" style="margin-top:10px;">
         </div>
     </div>
 </div>
</form>
</div>
</div>
</div>
</body>
</html>
