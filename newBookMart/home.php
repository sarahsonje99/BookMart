
<?php
session_start();
$username = "root";
$password = "";
$database = "bookmart";
$con = mysqli_connect("localhost",$username,$password,$database);
if(!$con){
    die("Connection failed: ".mysqli_connect_error());
}

if(isset($_POST['username'])){
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    if($_POST['isSeller'] == 'true')
        $sql = "SELECT * FROM seller WHERE username='".$uname."' AND password='".$pass."' limit 1";
    else if ($_POST['isSeller'] == 'false')
        $sql = "SELECT * FROM customer WHERE username='".$uname."' AND password='".$pass."' limit 1";
    //$sql2 = "INSERT INTO seller(username, password, email, seller_fullname) VALUES('admins','admins','admins@gmail.com','admin seller');";
    $result = mysqli_query($con,$sql);
    //$result1 = mysqli_query($con, $sql2);
    if(!empty($result)){
        //echo "is a seller";}
        $row = mysqli_fetch_assoc($result);
        // if($_POST['isSeller'] == 'false')
        //echo $row["username"];
        $_SESSION["username"] = $row["username"];
        if($_POST['isSeller'] == 'false')
            $_SESSION["usertype"] = "customer";
        else if($_POST["isSeller"] == 'true')  
            $_SESSION["usertype"] = "seller";
        header("Location: home.php");
        exit();
    }
    else{
        //$_SESSION["loggedIn1"] = "false";
        echo "Incorrect Login Details";
        exit();
    }

}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Book Mart</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        
        <style>
            body{               
                background-repeat: no-repeat;
                background-size: cover; 
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
            .title{
                font-size:18px;
            }     
            .det{
                font-size:14px;
            } 
            .tag{
                background-color:rgb(216, 216, 216);
                padding:2px;
                border-radius:3px;
                color: rgb(7, 7, 7);
            }
            .col-sm-2{
                margin: 5px;
            }
            .image{
                height: 300px;
                padding: 0%
            }
            .desc{
                margin: 5px;
                height:120px;
            }
            #contain{
                width: 1300px;
                padding-left: 100px;
            }
            al{
                width:100%;
                display:flex;
                align-self:center;
            }
            img{
                width:225px;
                height:300px;
            }
            .tile{
                background-color: white;
                margin-bottom: 75px;
                padding-left: 27px;
                padding-right: 27px;
                padding-top: 12px;
                width: 240px;
                border-radius: 5px;
            }
            .vertical-dist-between-tiles {
                height: 500px;
            }
            .blank{
                width:60px;
            }
            .modal a.close-modal {
                visibility: hidden;
                position: absolute;
                top: 3px;
                right: 3px;
                width: 30px;
                height: 30px;
                color:white;
                text-indent: -9999px;
            }
            .modal {
                display: inline-block;
                vertical-align: middle;
                position: relative;
                z-index: 2;
                max-width: 300px;
                box-sizing: border-box;
                width: 90%;
                background-color: rgba(240,240,240,0.95);
                padding: 15px 30px;
                border-radius: 10px;
                box-shadow: 0 0 10px #000;
                text-align: center;
            }
            .loginbtn{
                color:#1414ff;
                border: 1px solid #1414ff;
                background-color:inherit;
                height: 2.5em;
                width: 5em;
                border-radius:3px;
                font-size:16px;
            }
            .loginbtn:hover{
                color:white;
                background-color:#1414ff;
            }

            /* .log{
                height: 2.5em;
                width: 5em;
                background: none;
                border: solid 1px black;
                color: black;
            } */
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
        $(document).ready(function () {
            $('a.open-modal').click(function (event) {
                $(this).modal({
                    fadeDuration: 250
                });
                return false;
            });
        });

        
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
                            <?php if($_SESSION['usertype'] == "customer"): ?>
                                <a href="orders.php">My Orders</a>
                            <?php elseif($_SESSION['usertype'] == "seller"): ?>
                                <a href="shelf.php">My Shelfs</a>
                            <?php else: ?>
                                <li ><a href="#ex1" rel="modal:open"> My Shelf/My Orders</a>
                            <?php endif; ?>
                            </li>
                            <li>
                            <?php if ($_SESSION['usertype']) : ?>
                                <a href="profile.php"> Profile</a></li> 
                            <?php else: ?>
                                <a href="#ex1" rel="modal:open"> Profile</a>   
                            <?php endif; ?> 

                            
                        </ul>
                        <form class="navbar-form navbar-left" action="">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Search a book!">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>
                            </button>
                          </form>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($_SESSION['usertype'] ): ?>
                                <li><a > <?php echo "Hi, ". $_SESSION["username"]. "!"; ?></a></li>
                                <li ><a> Logout</a>
                                </li> 
                            <?php else: ?>
                                <li ><a href="#ex1" rel="modal:open"> Login</a>
                                </li>   
                            <?php endif; ?>                            
                            <li ><a></a>
                            </li>
                        </ul>
                    </span>
                </div>
            </nav>
        </div>
        <!--Modal Content-->
        <div class="modal login_cont" id="ex1" style="display:none;">
	            <div class="form">
                <h1 style="margin-top:0px">Login</h1>
                <form id="myForm" role="form" action="home.php" method="post" enctype="multipart/form-data">
                    <p style="font-size:16px; text-align: left; margin-left:27px; margin-bottom:0px;"><br>Username </p>
                    <input class="namebox" type="text" id="email" name="username">
                    <p style="font-size:16px; text-align: left; margin-left:27px; margin-bottom:0px;"><br>Password </p>
                    <input class="passbox" type="password" id="pwd" name="password">
                    <br><br>
                    <p style="text-align:start">Login as:&nbsp;
                        <label>
                            <input type="radio" name="isSeller" value="true" />&nbsp;Seller&nbsp;
                        </label>&nbsp;&nbsp;
                        <label>
                            <input type="radio" name="isSeller" value="false" />&nbsp;Customer&nbsp;
                        </label>
                    </p>
                    <br>
                    <input type="submit" value="Sign In!" class="loginbtn"><br>
                </form>
            </div>
         </div>
         
        <div style="background-color: rgb(0, 0, 0); color:rgb(0, 0, 0)">
            
            <div class="container-fluid" id="contain">  
                <br>
                <h3 style="color: white">Catalogue : </h3>          
                <br>
                <div class="row vertical-dist-between-tiles">
                
                    <div class="col-sm-2 tile" >
                        <div class="row image">
                            <span><img class="img-responsive" style="width:100%; height: 100%;" src = "https://resizing.flixster.com/7-QFEH63yycuAzN5jjo6fevs0qg=/206x305/v1.bTsxMTIwOTQ2MDtqOzE3NzI0OzEyMDA7MzMxODs0NDI0"></span>
                        </div>
                        <div class = "row desc">
                            <p class="title">The Da Vinci Code</p>
                            <p class="det">Dan Brown</p>
                            <p class="det"><span class="tag">Thriller</span>&nbsp;&nbsp;<span class="tag">Novel</span></p>        
                        </div>
                        <form action="book.php" method="get" >
                            <button type="submit" >View</button>
                        </form>
                    </div>
                    <div class="col-sm-1 blank"></div>
            
                    <div class="col-sm-2 tile">
                        <div class="row image">
                            <span><img class="img-responsive" style="width:100%; height: 100%;" src = "https://www.booksofbuderim.com.au/wp-content/uploads/2016/05/Paper-Towns-MTI-Cover-521x710.jpg"></span>
                        </div>
                        <div class="row desc">
                            <p class="title">Paper Towns</p>
                            <p class="det">John Green</p>
                            <p class="det"><span class="tag">Classic</span>&nbsp;&nbsp;<span class="tag">Novel</span></p>
                        </div>
                    </div>
                    <div class="col-sm-1 blank"></div>

                    <div class="col-sm-2 tile">
                        <div class="row image">
                            <span><img class="img-responsive" style="width:100%; height: 100%;" src = "https://images-na.ssl-images-amazon.com/images/I/5114SGc8lmL._SX356_BO1,204,203,200_.jpg"></span>
                        </div>
                        <div class="row desc">
                            <p class="title">Tom Sawyer</p>
                            <p class="det">Mark Twain</p>
                            <p class="det"><span class="tag">Adventure</span>&nbsp;&nbsp;<span class="tag">Novel</span></p>
                        </div>
                    </div>
                    <div class="col-sm-1 blank"></div>
                
                    <div class="col-sm-2 tile">
                        <div class="row image">
                            <span><img style="width:100%; height: 100%;" src = "https://images-na.ssl-images-amazon.com/images/I/51KsgCsIYyL._SX315_BO1,204,203,200_.jpg"></span>
                        </div>
                        <div class="row desc">
                            <p class="title">Lord of the Flies</p>
                            <p class="det">William Golding</p>
                            <p class="det"><span class="tag">Classic</span>&nbsp;&nbsp;<span class="tag">Novel</span></p>
                        </div>
                    </div>
                    
                    
                </div>
                

                <div class="row vertical-dist-between-tiles ">
                    <div class="col-sm-2 tile">
                        <div class="row image">
                            <span><img style="width:100%; height: 100%;" src = "https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4722/9781472234353.jpg"></span>
                        </div>
                        <div class="row desc">
                            <p class="title">Neverwhere</p>
                            <p class="det">Neil Gaiman</p>
                            <p class="det"><span class="tag">Classic</span>&nbsp;&nbsp;<span class="tag">Novel</span></p>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <script>
            function passbid(){
                <?php 
                    $_SESSION['bid'] = 12;
                ?>
            }
        </script>
        
    </body>
</html>