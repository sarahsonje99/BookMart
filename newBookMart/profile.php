<?php

session_start();

$username = "root";
$password = "";
$database = "bookmart";
$con = mysqli_connect("localhost",$username,$password,$database);
if(!$con){
    die("Connection failed: ".mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Book Mart</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body{               
                background-repeat: no-repeat;
                background-size: cover;
                background-color: black; 
            }
            .txt{
                font-family: Georgia Black;
                text-indent:15%;
            }
            .container-fluid{
                background-size: cover;
                background-position: bottom;
            }
            .bgimg{
                background-image: url('title1.jpg');
                height: 250px;
            } 
            .checked {
                color: orange;
            }
            
            #points{
                width: 135px;
                padding: 8px;
                border-radius: 10px;
                border: 1px solid gray;
                margin: 0; 
            }
            .container{
                border:1px solid grey;
                box-shadow: 0.5px 0.5px 1px black;
                background-color: white;
                margin-top:42px;
            }
            .affix {
      			top: 0;
      			width: 100%;
      			z-index: 9999 !important;
  			}
			.affix + .container-fluid {
     			padding-top: 70px;
 			}
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        

        <script>
        function logoutJS() {
            <?php session_destroy(); 
            console.log("Logged out?"); ?>
            alert("You have logged out!")
        }
        </script>
    </head>
    <body >    
        <div class="container-fluid bgimg" >
            <br><br><br><br><br><br>
            <b><h1 class="txt">BOOKMART</h1> </b>
            <p class="txt">The biggest online book store!</p> 
        
        
            <nav id="navb" data-spy="affix" data-offset-top="225" class="navbar navbar-inverse" >
                <div class="container-fluid">
                    <span class="text-danger">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">BookMart</a>
                        </div>
                        <ul class="nav navbar-nav" style="text-indent:0%">
                            <li class=""><a href="home.php">Home</a></li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Thriller</a></li>
                                <li><a href="#">Classic</a></li>
                                <li><a href="#">Adventure</a></li>
                            </ul>
                            </li>
                            <li>
                                <a href="shelf.php">My Orders</a></li>
                            <li><a href="#">My Profile</a></li>
                        </ul>
                        <form class="navbar-form navbar-left" action="">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Search a book!">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>
                            </button>
                          </form>
                        <ul class="nav navbar-nav navbar-right">
                        <li ><a onclick = logoutJS() href="home.php"> Logout</a>
                        </li>
                            <li ><a></a>
                            </li>
                        </ul>
                    </span>
                </div>
            </nav>       
        </div>
        <div class="container" style="border-radius:5px;" >
            <div class="row" style="margin-left: 20px; margin-bottom: 10px; ">
            	<h1>Username</h1>
            	<h3>Email Adderess</h3> 
            	<span class="fa fa-star checked"></span>
            	<span class="fa fa-star checked"></span>
            	<span class="fa fa-star checked"></span>
            	<span class="fa fa-star"></span>
            	<span class="fa fa-star"></span>
            	<br><br>
            	<div id="points">
            		<h5><b>Points: 1000 Rs.</b></h5>
            	</div> <br>
            	<p style="margin-left: 2px">
            		<b style="font-size: 20px">Address:</b><br>
            		345, dyhj, ftrhy, rh<br>
            		Pincode: 400 035
            	</p>
            	<p>jutrg<br><br>
            	Info 1<br>
            	Info 2<br>
            </div>
        </div>
        <br>
    </body>
</html>