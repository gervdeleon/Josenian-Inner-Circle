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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Normailize Stylesheet -->
    <link rel="stylesheet" href="css/normalize.min.css">

    <!-- Main Styles -->
    <link rel="stylesheet" href="css/templatemo_style.css">

    
    <script src="js/modernizr.custom.js"></script>

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>
    <header  id="top">
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
                                <img src="logos/JIC3.png">
                                <span class="logo-s"></span>
                            </a>
                        </div>  
                    </div>
                    <div class="collapse navbar-collapse" id="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <span class="nav-s"></span>
                            <li class="active"><a href="#top">Home</a></li>
                            <!-- <li><a href="#product-inner">Products</a></li> -->
                            <li><a href="#portfolio">Profile</a>
                            </li>
                            
                            <li><a href='softeng/pages/logout.php'>Logout</a></li>
                        </ul>
                    </div>
                </div> 
            </div>
        </nav>
    </header>

    <div class="department">


<br>
        <div class="container">
            <div class="row">

                <form action="softeng/pages/search.php" method="post">
                   <ul class="nav navbar-nav navbar-right">
               
                
                 <li>
                
                      <div class="search">
                      <div class="col-sm-8">
                        <input type="text"  name="searchkey" class="form-control input-sm" maxlength="64" placeholder="Search" required />
                        </div>
                        <button type="submit" id="btnsearch" name="search" class="btn btn-primary btn-sm">Search</button>
                      </div>
                 
                 </li> 
               </ul>   
                </form>
            

            </div>
        </div>

    </div>
    <div id="products">
        <div class="container">
            <div class="row" id="product-inner">
                <div class="col-md-4 product-item text-center">
                    <div class="image-holder">
<!--                         <img src="images/PHIL.png" alt="">
-->                    </div>
</div>

<div class="col-md-4 product-item text-center">
    <div class="image-holder">
<!--                         <img src="images/PAWN.png" alt="">
-->                    </div>
</div>
</div>
</div>
</div>
<div id="portfolio">
    <div class="container" id="Grid">
        <div class="row">
            <div class="col-md-12 text-center title">
                <h2>COLLEGE DEPARTMENTS</h2>
            </div>
        </div>
        <table align="center">
            <tr><td><a href="pages/ask.php?dept=CAS"><img src="dept/CAS.png" class="lightbox-button"></a>
            </td>
            <td><a href="pages/ask.php?dept=CICCT"><img src="dept/CICCT.png" class="lightbox-button"></a>
            </td>
            <td><a href="pages/ask.php?dept=Commerce"><img src="dept/Commerce.png" class="lightbox-button"></a></td></tr>
            <tr><td><img src="img/pp/new/white.png"></td>
                <td><img src="img/pp/new/white.png"></td>
                <td><img src="img/pp/new/white.png"></td></tr>
                <tr>
                    <td><a href="pages/ask.php?dept=Engineering"><img src="dept/Engineering.png" class="lightbox-button"></a></td>
                    <td><a href="pages/ask.php?dept=CoEd"><img src="dept/COE.png" class="lightbox-button"></a>
                    </td>
                    <td><a href="pages/ask.php?dept=Law"><img src="dept/Law.png" class="lightbox-button"></a>
                    </td></tr>
                    <tr><td><img src="img/pp/new/white.png"></td>
                        <td><img src="img/pp/new/white.png"></td>
                        <td><img src="img/pp/new/white.png"></td></tr>
                    </tr>
                </table>  
            </div>
        </div>

        <div class="container"  >
         <div class="row" >
          <div class="col-md-12" align="center">
              <p>
                <h3>Vision</h3>
                <h5>We envision the Josenian Inner Circle to be a hub of entertainment and recreational activities for the unification and establishment of healthy relationships among the members of the Josenian Community.</h5>
                <br>

                <h3>Mission</h3>
                <ul>
                 <li> The Josenian Inner Circle is a Social Networking site designed:</li>
                 <li> •   Provide the students of the University of San Jose-Recoletos connectivity by letting users add other users that they know. </li>
                 <li>•   Provide effective communication between the students by sending messages to each other</li>
                 •   Notify the students on announcements and events concerning the university or their respective departments<br>
                 •   Provide security and safety of data posted by encrypting necessary data 
             </ul>
         </p>
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