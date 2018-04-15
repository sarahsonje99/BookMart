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
                height: 275px;
                padding: 0%
            }
            .desc {
                margin: 5px;
                height:150px;
            }
            #contain {
                width: 1300px;
                padding-left: 80px;
            }
            img {
                /* width:200px; */
                height:235px;
            }  
            hr {
                width:90%;
                border: 1px solid grey;
            }
            .a {
                background-color:white;
                color: black;
                border-radius: 5px;
                padding-left: 20px;
                margin-top:0px;
            }
            #price{
                width: 120px;
                padding: 6px;
                border-radius: 10px;
                border: 1px solid gray;
                margin: 0; 
            }
            .but {
                font-size:14px;
                margin-bottom: 20px;
                background-color:Gold;
                border: 1px solid Gold;
                color: white;
                padding: 15px 32px;
                text-align: center;
                cursor: pointer;
            }
            .affix {
      			top: 0;
      			width: 100%;
      			z-index: 9999 !important;
  			}
			.affix + .container-fluid {
     			padding-top: 70px;
 			}
            td:first-child{
                width:70px;
            }
            .img-responsive{
                height:275px;
            }

        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <script>

        </script>
    </head>
    <body >  
             
        <div class="container-fluid bgimg"  >
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
                            <li class=""><a href="#">Home</a></li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Thriller</a></li>
                                <li><a href="#">Classic</a></li>
                                <li><a href="#">Adventure</a></li>
                            </ul>
                            </li>
                            <?php if($_SESSION['username'] && $_SESSION['usertype'] == "customer"): ?>
                                <li><a href="orders.php">My Orders</a></li>
                                <li><a href="cart.php">Cart</a></li>
                            <?php elseif($_SESSION['username'] && $_SESSION['usertype'] == "seller"): ?>
                                <a href="shelf.php">My Shelf</a>
                            <?php endif ?>
                            <li><a href=profile.php>Profile</a></li>
                        </ul>
                        <form class="navbar-form navbar-left" action="" method = "get">
                            <div class="form-group">
                              <input type="text" class="form-control" name="searchquery" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>
                            </button>
                          </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a > <?php echo "Hi, ". $_SESSION["username"]. "!"; ?></a></li>
                            <li ><a href="logout.php"> Logout</a>
                            </li>
                            <li ><a></a>
                            </li>
                        </ul>
                    </span>
                </div>
            </nav>
        </div>
        <div style="background-color: black; color:white">
            <div class="container-fluid" id="contain">  
                <br>
                <h2>
                    <?php
                    $bid = $_GET["bookID"];
                    $sql2 = "SELECT * FROM book WHERE book_id = ".$bid;
                    $result2 = mysqli_query($con,$sql2);
                    //echo "<h1 style='color:white;'>hiii</h1>";
                    $num_books = mysqli_num_rows($result2);
                    $row = mysqli_fetch_array($result2);
                    ?>
                    <?php echo $row["book_name"];  ?> 
 
                </h2>          
                <br>
                <div class="row " style="height: 800px">
                    <div class="col-sm-2">
                        <div class="row image">
                            <span><img class="img-responsive" src ="<?php echo $row["imgUrl"]; ?> ">
                            </span>
                        </div>
                        <div class="row desc">
                            <p class="title">  <?php echo $row["book_name"];  ?> </p>
                            <p class="det"><?php echo $row["author"];  ?></p>
                            <p class="det" >
                            <!-- <span class="tag">Classic</span>&nbsp;&nbsp;<span class="tag">Novel</span> -->
                            <?php 
                                // foreach($genres as $g){
                                    // echo '<span class="tag">'.($g[0]).'</span>&nbsp;&nbsp;';
                                    // echo "<table><tr><td>".($row_users['email'])."</td></tr>";

                                // }
                            ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
			        <div class="col-sm-9 a" >
				        <h3>Brief Summary</h3>
                        <p><?php echo $row["summary"];  ?></p>
                        <hr>
	                    <table>
		                <tr>
			                <td><b>Author:</b> </td>	
			                <td><?php echo $row["author"];  ?></td>
                		</tr>
	    	            <tr>
    		            	<td><b>Genre:</b></td>
                            <td>	
                            <?php
                                $sql = "SELECT * FROM hasgenre h, genre g WHERE h.fk_genre_id=g.genre_id AND h.fk_book_id=15";
                                //echo "<h1 >.$sql.</h1>";
                                $result3 = mysqli_query($con,$sql);
                                $num_genres = mysqli_num_rows($result3);
                                for($k=0; $k<$num_genres; $k++) {
                                    if($k!=0)
                                        echo ", ";
                                    $row2 = mysqli_fetch_array($result3);
                                    echo $row2["genre_name"];
                                }
                            ?>
                            </td>
                        </tr> 
                        <tr>
		    	            <td><b>Pages:</b> </td>	
			                <td><?php echo $row['pages'];  ?></td>
		                </tr>                       
                        <tr>
                			<td><b>Country:</b> </td>	
			                <td>United States</td>
            	    	</tr>
            		    
		                <tr>
            		    	<td><b>Date:</b> </td>
	            		    <td>October 16, 2008</td>
    	            	</tr>
	    	            
	                    </table>
                        <br>
                        <div id="price">
                            <h5><b>Price: Rs. <?php echo "{$row['book_cost']}";  ?></b></h5>
                        </div>
                        <br>
                        <!-- <p>skghjr<br>ggsuirg<br>skerjg<br>sejgh<br></p> <br> -->
                        <Input type="button" class="but" value="Add to cart"> 
                    </div>   
                </div> 
            </div>
        </div>
    </body>
</html>
