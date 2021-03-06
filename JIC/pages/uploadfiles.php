<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=jic', "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_SESSION['idnum'];
$query = $pdo->prepare('SELECT * from user where idnum=?');
$query->bindParam(1, $id);
$query->execute()




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
                    <div class="list-group">
                        <a href="profile.php" class="list-group-item">
                            <i class="fa fa-user"></i> PROFILE
                        </a>
                        <a href="wall.php" class="list-group-item">
                            <i class="fa fa-pencil"></i> WALL
                        </a>
                        <a href="innercircle.php" class="list-group-item">
                            <i class="fa fa-circle-o"></i> INNER CIRCLE
                        </a>
                        <a href="messaging.php" class="list-group-item">
                            <i class="fa fa-envelope"></i> MESSAGES
                        </a>
                        <a href="requests.php" class="list-group-item">
                            <i class="fa fa-heart"></i> REQUESTS <span class="badge"></span>
                        </a>
                        <a href="uploadfiles.php" class="active list-group-item">
                            <i class="fa fa-folder-open"></i> FILES <span class="badge">14</span>
                        </a>
                    </div>       
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

        <div>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                File: <input type="file" name="uploaded">
                <input type="submit" name="uploaded" value="Upload">
            </form>
        </div>

        <?php




        require_once "../softeng/Controller/AccountInfo.php";
        require_once "../softeng/Controller/AccountController.php";
        use controller\AccountInfo as Account;
        use controller\AccountController as AccountController;

        $account = new Account(new AccountController('localhost', 'jic', 3306, 'root', ''));


        $result=$account->displayFiles($_SESSION['idnum']);

        foreach ($result as $row) {
            echo "<a href='".$row['path']."' style='color:black;'>".$row['name']."</a><br>";
        }



        ?>

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




