<?php   
    session_start();
    error_reporting(0);
    $username = "root";
    $password = "";
    $database = "bookmart";
    $database2 = "bookmart2";
    $con = mysqli_connect("localhost",$username,$password,$database);
    $con2 = mysqli_connect("localhost", $username, $password, $database2 );

    if(!$con || !$con2){
        die("Connection failed: ".mysqli_connect_error());
    }

/*
                            if(isset($_POST['addtocart_sells'])){
                                $sells_id = $_POST['addtocart_sells'];
                                $sql3 = "INSERT INTO booktocart(fk_customer_id, fk_sells_id) VALUES (".($_SESSION["user_id"]).",".$sells_id.")";
                                echo $sql3;
                                exit();
                                $result5 = mysqli_query($con, $sql3);
                                echo 'Added Successfully!';
                            }*/
                        
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
                height:300px;
                width: 
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
            .checked {
            color: orange;
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
       
    </head>
    <body >
     
    <!-- background header and navigation included here    -->
    <?php require($DOCUMENT_ROOT . "navbar.php"); ?>
    <!-- navbar end -->  
        
        <div style="background-color: black; color:white">
            <div class="container-fluid" id="contain">  
                <br>
                <h2>
                    <?php
                    $bid = $_GET["bookID"];
                    $sql2 = "SELECT * FROM book WHERE book_id = ".$bid;
                    $result2 = mysqli_query($con, $sql2);
                    $result3 = mysqli_query($con2, $sql2);
                    //echo "<h1 style='color:white;'>hiii</h1>";

                    $num_books = mysqli_num_rows($result2);
                    $row1 = mysqli_fetch_array($result2);
                    $row2 = mysqli_fetch_array($result3);
                    if(empty($row1) && !empty($row2)){
                        $row = $row2;
                    }
                    else{
                        $row = $row1;
                    }
        

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
                            <p class="det"></p>
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
                                $sql = "SELECT * FROM hasgenre h, genre g WHERE h.fk_genre_id=g.genre_id AND h.fk_book_id=".$bid;
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
                        <form method="post" onsubmit="myFunc()" action="addToCart.php">
                        <?php 
                            $sql2 = "SELECT * FROM seller s, sells ss WHERE ss.avail>0 AND s.seller_id = ss.fk_seller_id AND ss.fk_book_id = ".$bid;
                            $result4 = mysqli_query($con, $sql2);
                            $num_sellers = mysqli_num_rows($result4);
                            if($num_sellers==0)
                                echo '<p><strong>No seller available!</strong> </p>';
                            else
                                echo '<p><strong>Select a Seller:</strong> </p>';
                            
                            for($i=0; $i<$num_sellers; $i++){
                                //echo '<p>hi</p>';
                                $row = mysqli_fetch_array($result4);
                                echo '<div class="row"><label class="col-sm-3"><input  type = "radio" name="addtocart_sells" value="'.($row["sells_id"]).'">&nbsp;&nbsp;'.($row["seller_fullname"]).'</label>';
                                echo '<span class="col-sm-6"> Rating: ';
                                $rating=$row['seller_rating'];
                                if($rating==0)
                                    echo 'No rating available';
                                else {
                                    for($j=0; $j<5; $j++) {
                                        if($j<$rating)
                                            echo '<span class="fa fa-star checked"></span>';
                                        else
                                            echo '<span class="fa fa-star"></span>';
                                    }
                                }
                                echo '</div>';
                            }
                        ?>
                        <br>
                        <?php if($num_sellers!=0): ?>
                            <button type="submit" class="but" >Add To Cart </button>
                        <?php endif ?>
                        </form>
                        
                    </div>   
                </div> 
            </div>
        </div>
    </body>
</html>
