<?php

session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: home.php');
}

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
                height: 300px;
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
             a{
                color:black;
                /* text-decoration:none; */
            }
            a:hover{
                text-decoration:none;
                color:black;
            }
            .bghover:hover{
                background-color:#d7d7d7;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        

        <script type="text/javascript">
function submitform()
{
document.forms["genreForm"].submit();
}
</script>
    </head>
    <body >    
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
                                        <form class="bghover" id="genreForm" action="changeGenre.php" method="post">
                                            <input type="hidden" value="1" name="genreq">
                                            <a style="padding:8px;" href="javascript: submitform()">Fiction</a>
                                        </form>
                                    </li>
                                    <li>
                                        <form class="bghover" id="genreForm" action="changeGenre.php" method="post">
                                            <input type="hidden" value="2" name="genreq">
                                            <a style="padding:8px;" href="javascript: submitform()">Thriller</a>
                                        </form>
                                    </li>
                                    <li>
                                        <form class="bghover" id="genreForm" action="changeGenre.php" method="post">
                                            <input type="hidden" value="3" name="genreq">
                                            <a style="padding:8px;" href="javascript: submitform()">Classics</a>
                                        </form>
                                    </li>
                                    <li>
                                        <form class="bghover" id="genreForm" action="changeGenre.php" method="post">
                                            <input type="hidden" value="4" name="genreq">
                                            <a style="padding:8px;" href="javascript: submitform()">Novel</a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <?php if($_SESSION['username'] && $_SESSION['usertype'] == "customer"): ?>
                                <li><a href="orders.php">My Orders</a></li>
                                <li><a href="cart.php">Cart</a></li>
                            <?php elseif($_SESSION['username'] && $_SESSION['usertype'] == "seller"): ?>
                                <li><a href="shelf.php">My Shelf</a></li>
                            <?php endif ?>
                            <li><a href="profile.php">Profile</a></li>
                        </ul>
                        <form class="navbar-form navbar-left" action="booksearch.php" method="get">
                            <div class="form-group">
                              <input type="text" class="form-control" name="searchquery" placeholder="Search a book!">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>
                            </button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($_SESSION['usertype'] ): ?>
                                <li><a > <?php echo "Hi, ". $_SESSION["username"]. "!"; ?></a></li>
                            <?php endif ?>
                            <li ><a href="logout.php"> Logout</a>
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
             <?php  
                if($_SESSION['usertype'] == "customer"){
                    $sql = "SELECT * FROM customer WHERE customer_id = ".$_SESSION['user_id'];
                }
                else{
                    $sql = "SELECT * FROM seller WHERE seller_id = ".$_SESSION['user_id'];
                }
                    $result = mysqli_query($con, $sql);
                    if(!empty($result)){
                        $row = mysqli_fetch_assoc($result);
                    }        
             ?>



                <div class="col-sm-6">
                <?php if($_SESSION['usertype'] == "customer"): ?>
            	    <h1><?php echo $row['customer_fullname'];?></h1>
                <?php elseif($_SESSION['usertype'] == "seller"): ?>
            	    <h1><?php echo $row['seller_fullname'];?></h1>
                <?php endif ?>
                <br>
                <h4><?php echo 'Username: '.$row['username']; ?></h4>
                <br>
                <h4><?php echo 'Email:    '.$row['email'];   ?></h4> 
            	<!-- <span class="fa fa-star checked"></span>
            	<span class="fa fa-star checked"></span>
            	<span class="fa fa-star checked"></span>
            	<span class="fa fa-star"></span>
            	<span class="fa fa-star"></span> -->
            	<br>
                
                </div>
            	<br>
                <div class="col-sm-6">
            	<p style="margin-left: 2px">
            		<b style="font-size: 20px">Address:</b><br>
            		<?php echo $row['address']; ?>
            	</p>
                <br><br>
                <?php if ($_SESSION['usertype'] == "customer"){
                    echo '<div id="points">
            		<h5><b>Points: Rs. '.($row['points']).'</b></h5>
                </div> ';
                }
                
                else{
                    $rating=$row['seller_rating'];
                    for($i=0; $i<5; $i++) {
                        if($i<$rating)
                            echo '<span class="fa fa-star checked"></span>';
                        else
                            echo '<span class="fa fa-star"></span>';
                    }
                }
                ?>
                </div>
            	
            </div>
        </div>
        <br>
    </body>
</html>