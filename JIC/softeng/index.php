<?php  
session_start();
?>
<!DOCTYPE html>
<html class="no-js"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Josenian Inner Circle</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
    
    <div class="site-bg"></div>
    <div class="site-bg-overlay"></div>

    <!-- TOP HEADER -->
    <div class="top-header">
        <h2>Josenian Inner Circle</h2>
    </div> 



    <div class="visible-xs visible-sm responsive-menu">
        <a href="#" class="toggle-menu">
            <i class="fa fa-bars"></i> Show Menu
        </a>
        <div class="show-menu">
            <ul class="main-menu">
                <li>
                    <a class="show-1 active homebutton" href="#"><i class="fa fa-home"></i>Home</a>
                </li>
                <li>
                    <a class="show-2 aboutbutton" href="#"><i class="fa fa-user"></i>About Us</a>
                </li>
                <li>
                    <a class="show-3 projectbutton" href="#"><i class="fa fa-camera"></i>Gallery</a>
                </li>
                
                
            </ul>
        </div>
    </div>

    <div class="container" id="page-content">
        <div class="row">


            
            <div class="col-md-9 col-sm-12 content-holder">
                <!-- CONTENT -->
                
                <div id="menu-container">
                    
                 
                    
                    
                    
                    <div id="menu-1" class="homepage home-section text-center">

                        <a href="#" class="site-brand"><img src="images/JIC2.png" alt=""></a>
                        
                        <div class="welcome-text">
                            <h2>Hello, Welcome to <strong>The Josenian Inner Circle</strong></h2>
                            <p>The Josenian Inner Circle is a social networking site exclusive for the use of the Josenian community. It is a web-based application that helps the students regarding their schoolworks. It features sharing of ideas and notes where students can upload files for the use of other students as a reference, asking of questions regarding a certain topic that they might have trouble with, answering of questions, expressing their concerns and contentment about the university or department, and keeping up-to-date regarding the updates and events that might take place in the University.</p>
                            
                        </div>
                    </div>

                    <div id="menu-2" class="content about-section" >
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <div class="box-content profile">
                                    <h3 class="widget-title" align="center">Login</h3>
                                    
                                    <form action="pages/login.php" method="post" >
                                        <div class="row">

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="idNum" placeholder="ID Number">
                                                </div>

                                                <div class="col-md-12" >
                                                    <input type="password" class="form-control" name="pword" placeholder="Password">
                                                </div>
                                                <div class="col-md-12" >
                                                    <input type="submit" class="btn btn-success" name="login" value="Login">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div id="menu-3" class="content gallery-section" align="center">
                        <div class="box-content">
                            
                            <div class="row main-low-margin">
                                <div class="col-md-12  col-sm-12 ">
                                    
                                 
                                    <h1><strong>Register Here ! </strong></h1>
                                    
                                    <form action="pages/register.php" method="post">
                                     
                                        
                                      <div class="row">
                                          <div class="col-sm-4 ">

                                            <div class="form-group" >
                                                ID Number<input type="text" name="idnum" class="form-control" required="required" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4 ">
                                            <div class="form-group">
                                             Username <input type="text" name="username"class="form-control"  >
                                         </div>
                                     </div>
                                     <div class="col-sm-4">
                                        <div class="form-group">
                                         Password <input type="password" name="password" class="form-control"  >
                                     </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        Firstname<input type="text" name="firstname"class="form-control" required="required" >
                                    </div>
                                </div>
                                <div class="col-sm-4 ">
                                    <div class="form-group">
                                        Last Name<input type="text" class="form-control" name="lastname">
                                    </div>
                                </div>
                                <div class="col-sm-4 ">
                                    <div class="form-group">
                                     Department 
                                     <select name="department" class="form-control">
                                         <option value="CAS">CAS</option>
                                         <option value="CICCT">CICCT</option>
                                         <option value="COC">COC</option>
                                         <option value="COENGG">COENGG</option>
                                         <option value="COE">COE</option>
                                         <option value="LAW">SCHOOL OF LAW</option>
                                     </select>
                                     <!--  <input type="text" class="form-control" name="department"  > -->
                                 </div>
                             </div>
                             
                             <div class="col-sm-4">
                                <div class="form-group">
                                 Contact Number <input type="text" name="contactnum" class="form-control"  >
                             </div>
                         </div>
                         <div class="col-sm-4">
                            <div class="form-group">
                             Email Address <input type="email" name="emailadd" class="form-control"  >
                         </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                         Address <input type="text" name="address" class="form-control"  >
                     </div>
                 </div>
             </div>
             <div class="row">
                <div class="col-md-12 ">
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="register">Register</button>
                        <br />
                        
                    </div>
                    

<!--                     <div>
                        
                       Already a member? <strong> <a href="login.php">Login</a>  </strong> 
                   </div> -->

               </div>
           </div>
       </form>
       
       
   </div>
</div>

</div>
</div>



</div>
</div>


<div class="col-md-3 hidden-sm">
    
    <nav id="nav" class="main-navigation hidden-xs hidden-sm">
        <ul class="main-menu">
            <li>
                <a class="show-1 active homebutton" href="#"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
                <a class="show-2 aboutbutton" href="#"><i class="fa fa-sign-in"></i>Sign-in</a>
            </li>
            <li>
                <a class="show-3 projectbutton" href="#">
                    <i class="fa fa-user"></i>Register</a>
                </li>
                
            </ul>
        </nav>

    </div>
</div>
</div>

<!-- SITE-FOOTER -->
<div class="site-footer">
<!--             <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Copyright &copy; 2084 Company Name | Design: <a href="#"><span class="orange">template</span><span class="green">mo</span></a></p>
                    </div>
                </div>
            </div> -->
        </div> <!-- .site-footer -->

        <script src="js/vendor/jquery-1.10.2.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <!-- templatemo 439 rectangle -->
    </body>
    </html>