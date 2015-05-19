<?php
session_start();
$id = $_GET['id'];
$status=0;
$pdo = new PDO('mysql:host=localhost;dbname=jic', "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query=$pdo->prepare('SELECT * from user where idnum = ?');
$query->execute(array($id));
$user = $query->fetch(PDO::FETCH_ASSOC);

$q1 = $pdo->prepare('SELECT count(*) as countStat from innercircle where status=? and friendID=?');
$q1->bindParam(1, $status);
$q1->bindParam(2, $id);
$q1->execute();

$r1  = $q1->fetch(PDO::FETCH_ASSOC);

$q1 = null;

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
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    
    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Normailize Stylesheet -->
    <link rel="stylesheet" href="../../css/normalize.min.css">

    <!-- Main Styles -->
    <link rel="stylesheet" href="../../css/templatemo_style.css">

    
    <script src="../../js/modernizr.custom.js"></script>

    <script src="../../js/vendor/modernizr-2.6.2.min.js"></script>

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
                    <img src="../logos/USJR2.png" align="middle">
                </div>
                <div class="sidebar">
                    <div class="mini-submenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>
                    <?php
                    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/MessageInfo.php');
                    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/jic/softeng/controller/MessageController.php');
                    use controller\MessageInfo as Message;
                    use controller\MessageController as MessageController;
                    $message = new Message (new MessageController('localhost', 'jic', 3306, 'root', ''));

                    $inbox = $message->countInbox($_SESSION['idnum']);

                    echo "<div class='list-group'>";
                    echo "<a href='../../pages/profile.php' class='active list-group-item'>";
                    echo "<i class='fa fa-user'></i> PROFILE";
                    echo "</a>";
                    echo "<a href='../../pages/wall.php' class='list-group-item'>";
                    echo "<i class='fa fa-user'></i> WALL";
                    echo "</a>";
                    echo "<a href='../../pages/innercircle.php' class='list-group-item'>";
                    echo "<i class='fa fa-circle-o'></i> INNER CIRCLE";
                    echo "</a>";
                    echo "<a href='../../pages/messaging.php' class='list-group-item'>";
                    echo "<i class='fa fa-envelope'></i> MESSAGES <span class='badge'>".$inbox['inboxNo']."</span></a></li>";
                    echo "</a>";
                    echo "<a href='../../pages/requests.php' class='list-group-item'>";
                    echo "<i class='fa fa-bell'></i> REQUESTS <span class='badge'>".$r1['countStat']."</span>";
                    echo "</a>";
                    echo "<a href='../../pages/uploadfiles.php' class='list-group-item'>";
                    echo "<i class='fa fa-folder-open'></i> FILES";
                    echo "</a>";



                    echo "</div>";
                    ?>        
                </div>
            </div>

      <!--       <div class="col-md-5 prof">
                <h2> Name: 
                    </br>
                    Department: </br>
                    Description: </br>

                </h2>

            </div> -->


            
        </div>
        <!--END ROW -->

        <div class="col-md-8">
            <table class="table table-striped">
                <tr>
                    <td><h2><?php
                        echo $user['firstname']." ".$user['lastname'];
                        ?></h2></td>
                    </tr>
                    <tr>
                        <td><h3>Department</h3> <?php
                          echo $user['department'];
                          ?></td>
                      </tr> 

                      <tr>
                        <td><h3>About Me</h3> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                        </tr>


                    </table>
                    <?php

                    if ($user['idnum']!=$_SESSION['idnum']){
                        $id=$user['idnum'];
                        $loggedin=$_SESSION['idnum'];
            // echo "<form action='../softeng/pages/addtoinnercircle.php?id=".$id."&loggedin=".$loggedin."' method='post'>";
                        echo "<a class='btn btn-primary' href='addtoinnercircle.php?id=".$id."&loggedin=".$loggedin."' role='button' name='add'>Add to Inner Circle</a>";
            // echo "</form>";

                    }

                    ?>
                </div>
            </div>


            <!--END CONTAINER -->
        </div>



        <script type="text/javascript">
            $(function(){

              $('#slide-submenu').on('click',function() {             
                $(this).closest('.list-group').fadeOut('slide',function(){
                  $('.mini-submenu').fadeIn();  
              });?

            });

              $('.mini-submenu').on('click',function(){   
                $(this).next('.list-group').toggle('slide');
                $('.mini-submenu').hide();
            })
          })
        </script>

    </body>
    </html>
    