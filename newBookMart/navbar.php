<?php
session_start();
error_reporting(0);
$username = "root";
$password = "";
$database = "bookmart";
$database2 = "bookmart2";
$con = mysqli_connect("localhost",$username,$password,$database);
$con2 = mysqli_connect("localhost",$username,$password,$database2);
if(!$con || !$con2){
    die("Connection failed: ".mysqli_connect_error());
}
//$_SESSION["genre"]="4";
// display_errors = on;
if(isset($_POST['username'])){
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    if($_POST['isSeller'] == 'true')
    {
        $sql = "SELECT * FROM seller WHERE username='".$uname."' AND password='".$pass."' limit 1";
        $sql2 = "SELECT * FROM seller WHERE username='".$uname."' AND password='".$pass."' limit 1";
    }
    else if ($_POST['isSeller'] == 'false')
    {
        $sql = "SELECT * FROM customer WHERE username='".$uname."' AND password='".$pass."' limit 1";
        $sql2 = "SELECT * FROM customer WHERE username='".$uname."' AND password='".$pass."' limit 1";
    }
    
    $result = mysqli_query($con,$sql);
    $result2 = mysqli_query($con2,$sql2);
    if(!empty($result) || !empty($result2)){
        if(!empty($result))
            $row = mysqli_fetch_assoc($result);
        else
            $row = mysqli_fetch_assoc($result2);
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
<script src="js/scripts.js"></script>


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