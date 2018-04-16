<?php
session_start();
error_reporting(0);
$username = "root";
$password = "";
$database = "bookmart";
$con = mysqli_connect("localhost",$username,$password,$database);
if(!$con){
    die("Connection failed: ".mysqli_connect_error());
}
//$_SESSION["genre"]="4";
// display_errors = on;
if(isset($_POST['username'])){
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    if($_POST['isSeller'] == 'true')
        $sql = "SELECT * FROM seller WHERE username='".$uname."' AND password='".$pass."' limit 1";
    else if ($_POST['isSeller'] == 'false')
        $sql = "SELECT * FROM customer WHERE username='".$uname."' AND password='".$pass."' limit 1";
    
    $result = mysqli_query($con,$sql);
    if(!empty($result)){
        $row = mysqli_fetch_assoc($result);
        if(!$row) {
            session_destroy();
            echo "Select appropriate option between Seller or Customer!";
            exit();
        }
        $_SESSION["username"] = $row["username"];
        if($_POST['isSeller'] == 'false') {
            $_SESSION["user_id"]=$row['customer_id'];
            $_SESSION["usertype"] = "customer";
        }  
        else if($_POST["isSeller"] == 'true') {
            $_SESSION["user_id"]=$row['seller_id'];
            $_SESSION["usertype"] = "seller";
        } 
           
        header("Location: home.php");
        exit();
    }
    else {
        session_destroy();
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
                height: 300px;
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
                /* margin-bottom: 75px; */
                padding-left: 27px;
                padding-right: 27px;
                padding-top: 12px;
                width: 240px;
                border-radius: 5px;
                border: solid black 0.2px;
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
             .btn{
                border-top-left-radius:0px;  
                border-top-right-radius:0px;  

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
    <!-- navbar styling starts here    -->
        <div class="container-fluid bgimg" >
            <br><br><br><br><br><br><br><br><br>
            <b><h1 class="txt">BOOKMART</h1> </b>
            <p class="txt">The biggest online book store!</p> 
        
        
            <nav id="navb" data-spy="affix" data-offset-top="280" class="navbar navbar-inverse" >
                <div class="container-fluid">
                    <span class="text-danger">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">BookMart</a>
                        </div>
                        <ul class="nav navbar-nav" style="text-indent:0%">
                            <li class=""><a href="home.php">Home</a></li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form id="genreForm" action="changeGenre.php" method="post">
                                        <a name="query" href="javascript: submitform()">Fiction</a>
                                    </form>
                                </li>
                                <li><a >Thriller</a></li>
                                <li><a >Classic</a></li>
                                <li><a >Novel</a></li>

                            </ul>
                            </li>
                            <?php if($_SESSION['username'] && $_SESSION['usertype'] == "customer"): ?>
                                <li><a href="orders.php">My Orders</a></li>
                                <li><a href="cart.php">Cart</a></li>
                            <?php elseif($_SESSION['username'] && $_SESSION['usertype'] == "seller"): ?>
                                <li><a href="shelf.php">My Shelf</a></li>
                            <?php else: ?>
                                <li ><a href="#ex1" rel="modal:open"> My Shelf/My Orders</a>
                            <?php endif; ?>
                            <?php if ($_SESSION['usertype']) : ?>
                                <li><a href="profile.php"> Profile</a></li>
                            <?php else: ?>
                                <li><a href="#ex1" rel="modal:open">Cart</a></li>
                                <li><a href="#ex1" rel="modal:open"> Profile</a></li>   
                            <?php endif; ?> 

                            
                        </ul>
                        <form class="navbar-form navbar-left" action="booksearch.php" method="get">
                            <div class="form-group">
                              <input type="text" class="form-control" name="searchquery" placeholder="Search a book!">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>
                            </button>
                        </form>
                            
                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($_SESSION['username'] && $_SESSION['usertype'] ): ?>
                                <li><a > <?php echo "Hi, ". $_SESSION["username"]. "!"; ?></a></li>
                                <li ><a  href="logout.php"> Logout</a>
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
        <!-- navbar styling ends here -->
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
                <br><br>
                <?php 
                   // $_SESSION['bookNotFound']=true;
                ?>
                <?php if($_SESSION['bookNotFound']==true): ?>
                    <p style="color:white">Search not found. Please try again.</p>
                    <script>console.log("work");</script>
                <?php 
                    $_SESSION['bookNotFound']=false;
                ?>
                <?php endif?>

                
                <?php if($_SESSION["genre"]!="10"): ?>
                    <div id="noGen">
                        
                        <br>
                        <?php
                            $sql4 = "SELECT * FROM genre WHERE genre_id=".$_SESSION["genre"];
                            $result4 = mysqli_query($con,$sql4);
                            //echo '<p style="color: white">'.$sql4.'</p>';
                            $row4 = mysqli_fetch_array($result4);
                            echo '          
                            <h3 style="color: white">'.$row4["genre_name"].'</h3>';
                            $sql2 = "SELECT * FROM book b, hasgenre g WHERE b.book_id=g.fk_book_id AND g.fk_genre_id= ".$_SESSION["genre"];
                            $result2 = mysqli_query($con,$sql2);
                            //echo "<h1 style='color:white;'>hiii</h1>";
                            $num_books = mysqli_num_rows($result2);
                            //echo "<h1 style='color:white;'>hiii".$num_books."</h1>";
                            for ($i=0; $i<$num_books; )
                            {
                                //echo "<h1 style='color:white;'>hiii</h1>";
                                echo '                                
                                    <div class="row vertical-dist-between-tiles">';
                                for($j=0 ;$j<4 && $i<$num_books; $j++, $i++ ){
                                    //echo "<h1 style='color:white;'>hiii</h1>";
                                    $row = mysqli_fetch_array($result2);
                                    $bid = $row["book_id"];
                                    $sql = "SELECT * FROM hasgenre h, genre g WHERE h.fk_genre_id=g.genre_id AND h.fk_book_id = ".$row['book_id'];
                                    //echo "<h1 style='color:white;'>.$sql.</h1>";
                                    $result3 = mysqli_query($con,$sql);
                                    $num_genres = mysqli_num_rows($result3);
                                    echo '
                                        <form action="book.php" method="get">
                                            <div class="col-sm-2 tile" name="bookID" type="submit" value="'.$bid.'" >
                                                <div class="row image">
                                                    <span><img class="img-responsive" style="width:100%; height: 100%;" src = "'.($row["imgUrl"]).'"></span>
                                                </div>
                                                <div class = "row desc">
                                                    <p class="title">'.($row["book_name"]).'</p>
                                                    <p class="det">'.($row["author"]).'</p>
                                                    <p class="det">';
                                                        for($k=0; $k<$num_genres; $k++) {
                                                            $row2 = mysqli_fetch_array($result3);
                                                            echo '<span class="tag">'.$row2["genre_name"].'</span>&nbsp;&nbsp;';
                                                        }
                                                        echo '
                                                    </p>
                                                </div>
                                                <button style="width:240px;margin-left:-27px;" class="btn btn-primary det" type="submit" name="bookID" value="'.$bid.'">View Book!</button>
                                            </div>
                                        </form>
                                    ';
                                    if($j!=3) {                        
                                        echo '
                                        <div class="col-sm-1 blank"></div>';
                                    }
                                }
                                echo '
                                    </div>
                                
                            ';
                            }
                        ?>
                    </div>
                            
                    <?php $_SESSION["genre"]="10"; ?>
                <?php else: ?>
                    <div id="noGen">
                        <br>
                        <?php
                            $sql2 = "SELECT * FROM book ";
                            $result2 = mysqli_query($con,$sql2);
                            $num_books = mysqli_num_rows($result2);
                            for ($i=0; $i<$num_books; )
                            {
                                //echo "<h1 style='color:white;'>hiii</h1>";
                                echo '<h3 style="color: white">Catalogue: </h3>';        
                                echo '                                
                                    <div class="row vertical-dist-between-tiles">';
                                for($j=0 ;$j<4 && $i<$num_books; $j++, $i++ ){
                                    //echo "<h1 style='color:white;'>hiii</h1>";
                                    $row = mysqli_fetch_array($result2);
                                    $bid = $row["book_id"];
                                    $sql = "SELECT * FROM hasgenre h, genre g WHERE h.fk_genre_id=g.genre_id AND h.fk_book_id = ".$row['book_id'];
                                    //echo "<h1 style='color:white;'>.$sql.</h1>";
                                    $result3 = mysqli_query($con,$sql);
                                    $num_genres = mysqli_num_rows($result3);
                                    echo '
                                        <form action="book.php" method="get">
                                            <div class="col-sm-2 tile" name="bookID" type="submit" value="'.$bid.'" >
                                                <div class="row image">
                                                    <span><img class="img-responsive" style="width:100%; height: 100%;" src = "'.($row["imgUrl"]).'"></span>
                                                </div>
                                                <div class = "row desc">
                                                    <p class="title">'.($row["book_name"]).'</p>
                                                    <p class="det">'.($row["author"]).'</p>
                                                    <p class="det">';
                                                        for($k=0; $k<$num_genres; $k++) {
                                                            $row2 = mysqli_fetch_array($result3);
                                                            echo '<span class="tag">'.$row2["genre_name"].'</span>&nbsp;&nbsp;';
                                                        }
                                                        echo '
                                                    </p>
                                                </div>
                                                <button style="width:240px;margin-left:-27px;" class="btn btn-primary det" type="submit" name="bookID" value="'.$bid.'">View Book!</button>
                                            </div>
                                        </form>
                                    ';
                                    if($j!=3) {                        
                                        echo '
                                        <div class="col-sm-1 blank"></div>';
                                    }
                                }
                                echo '
                                    </div>
                                
                            ';
                            }
                        ?>
                    </div>              
                <?php endif ?>
            </div>
        </div>   
    </body>
</html>