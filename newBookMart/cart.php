<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: home.php');
}
elseif($_SESSION['usertype']=='seller'){
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
            }
            hr{
                width:90%;
                border: 1px solid grey;
            }
            .image{
                height:210px;
                width: 100%;
                
            }
            .row{
                padding:12px;
            }
            .title{
                font-size:18px;
            }     
            .det{
                font-size:14px;
            }
            .affix {
      			top: 0;
      			width: 100%;
      			z-index: 9999 !important;
  			}
			.affix + .container-fluid {
     			padding-top: 70px;
 			}
            #placeOrder {
                color: black;
                background-color: inherit;
                border: solid black 1px;
                border-radius:3px;
                height: 50px;
                width: 120px;
            }
            #placeOrder:hover{
                color:white;
                background-color:black;
            }
            #remove {
                height: 35px;
                background-color:inherit;
                border-radius: 5px;
                align: center;
                margin:10px;
                margin-top:10px;
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
        

        <script>
        function myFunc() {
            alert("Successfully placed order!");
        }
        </script>
        <script type="text/javascript">
function submitform()
{
document.forms["genreForm"].submit();
}
</script>
    </head>
    <body >    
        <div class="container-fluid bgimg"  >
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
                            <li><a href="orders.php">My Orders</a></li>
                            <li><a href="#">Cart</a></li>
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
                            <li><a > <?php echo "Hi, ". $_SESSION["username"]. "!"; ?></a></li>
                            <li ><a href="logout.php"> Logout</a>
                            <li ><a></a>
                            </li>
                        </ul>
                    </span>
                </div>
            </nav>       
        
            <div class="container" style="border-radius: 5px" >


            <?php 
                $sql1 = "SELECT * FROM booktocart bc, customer c, book b, sells s, seller sr WHERE bc.in_buys=0 AND s.fk_seller_id=sr.seller_id AND b.book_id=s.fk_book_id AND s.sells_id=bc.fk_sells_id AND c.customer_id=bc.fk_customer_id AND c.customer_id=".$_SESSION['user_id'];
                $result1 = mysqli_query($con,$sql1);
                //echo "<h1 style='color:red;'>".$sql1."</h1>";
                $num_orders = mysqli_num_rows($result1);
                //echo "<h1 style='color:red;'>".$num_orders."</h1>";
                if($num_orders == 0)
                    echo '<div style="text-align:center;"><h2 >Your cart is empty! <a href="home.php" style=" text-decoration=none;">&nbsp;Add books</h2></div>';
                for($i=0; $i<$num_orders; $i++) {
                    $row = mysqli_fetch_array($result1);
                    echo '
                    <div class="row ">
                        <br>
                        <div class="col-sm-2">     
                            <span><img class="img-responsive image" src = "'.$row['imgUrl'].'"></span>
                        </div>
                        <div class="col-sm-10">
                            <div class="row" style="">
                                <div class="col-sm-8">
                                    <p class="title">'.$row['book_name'].'</p>
                                    <p class="det">'.$row['author'].'</p>
                                    <p class="det">Tags: ';
                                    $sql2 = "SELECT * FROM hasgenre h, genre g WHERE h.fk_genre_id=g.genre_id AND h.fk_book_id = ".$row['book_id'];
                                    //echo "<h1 style='color:white;'>.$sql.</h1>";
                                    $result2 = mysqli_query($con,$sql2);
                                    $num_genres = mysqli_num_rows($result2);
                                    for($k=0; $k<$num_genres; $k++) {
                                        if($k!=0)
                                        echo ", ";
                                        $row2 = mysqli_fetch_array($result2);
                                        echo $row2["genre_name"];
                                    }
                                    echo '
                                    </p>
                                    <p class="det">Seller : '.$row['seller_fullname'].'</p>
                                    <p class="det">Price : Rs.'.$row['book_cost'].'</p>
                                    <p class="det">Availability : '.$row['avail'].'</p>
                                </div>

                                <div class="col-sm-4">
                                    <form action="removeFromCart.php" method="post">
                                        <button type="submit" id="remove" name="bookcartID" value='.$row["booktocart_id"].'>Remove from cart</button>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>';
                    if($i!=$num_orders-1)
                        echo '<hr>';
                }
            ?>
<!--
                <div class="row ">
                    <br>
                    <div class="col-sm-2">     
                        <span><img class="img-responsive image" src = "https://www.booksofbuderim.com.au/wp-content/uploads/2016/05/Paper-Towns-MTI-Cover-521x710.jpg"></span>
                    </div>
                    <div class="col-sm-10">
                        <p class="title">Paper Towns</p>
                        <p class="det">John Green</p>
                        <p class="det">Tags: Classic, Novel</p>
                        <p class="det">Date of Purchase: 3<sup>rd</sup> April, 2018</p>
                        <p class="det">Delivery status : progress?</p>
                        <p class="det">Seller : seller1</p>
                        <p class="det">Price : Rs 348</p>

                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="col-sm-2">     
                        <span><img class="img-responsive image" src = "https://images-na.ssl-images-amazon.com/images/I/5114SGc8lmL._SX356_BO1,204,203,200_.jpg"></span>
                    </div>
                    <div class="col-sm-10">
                        <p class="title">Tom Sawyer</p>
                        <p class="det">Mark Twain</p>
                        <p class="det">Tags: Classic, Novel</p>
                        <p class="det">Date of Purchase: 3<sup>rd</sup> April, 2018</p>
                        <p class="det">Delivery status : progress?</p>
                        <p class="det">Seller : seller1</p>
                        <p class="det">Price : Rs 348</p>

                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="col-sm-2">     
                        <span><img class="img-responsive image" src = "https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4722/9781472234353.jpg"></span>
                    </div>
                    <div class="col-sm-10">
                        <p class="title">Neverwhere</p>
                        <p class="det">Neil Gaiman</p>
                        <p class="det">Tags: Classic, Novel</p>
                        <p class="det">Date of Purchase: 3<sup>rd</sup> April, 2018</p>
                        <p class="det">Delivery status : progress?</p>
                        <p class="det">Seller : seller1</p>
                        <p class="det">Price : Rs 348</p>    
                    </div>    
                </div>
                -->
                <br>
                <div class="row">
                    <div class="col-sm-10">
                    </div>
                    <div class="col-sm-2">


                    
                    </div>
                </div>
            </div>
            <br><br>
            <?php if($num_orders!=0): ?>  
            <form action="placeOrder.php" method="post" onsubmit="myFunc()">
                <button style="width:40%;margin-left:30%;margin-bottom:20px" class="col-sm-12 btn btn-lg btn-primary" >Place Order</button>
            </form>
            <?php endif ?>        
            <br><br>
        </div>

        
        
    </body>
</html>