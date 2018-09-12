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
    $result2 = mysqli_query($con2,$sql);
    if(!empty($result) || !empty($result2)) {
        $row = mysqli_fetch_assoc($result);
        $row2 = mysqli_fetch_assoc($result2);
        if($row)
        {
            echo "From 1st db";
            $_SESSION["username"] = $row["username"];
            if($_POST['isSeller'] == 'false') {
                $_SESSION["user_id"]=$row['customer_id'];
                $_SESSION["usertype"] = "customer";
            }  
            else if($_POST["isSeller"] == 'true') {
                $_SESSION["user_id"]=$row['seller_id'];
                $_SESSION["usertype"] = "seller";
            } 
        }
        else if($row2)
        {
            echo "From 2nd db";
            $_SESSION["username"] = $row2["username"];
            if($_POST['isSeller'] == 'false') {
                $_SESSION["user_id"]=$row2['customer_id'];
                $_SESSION["usertype"] = "customer";
            }  
            else if($_POST["isSeller"] == 'true') {
                $_SESSION["user_id"]=$row2['seller_id'];
                $_SESSION["usertype"] = "seller";
            } 
        }
        if(!$row2 && !$row) {
            echo "Null";
            session_destroy();
            echo "Select appropriate option between Seller or Customer!";
            exit();
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
                width: 100%;
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
                border-bottom: 0.5px;
            }
            .vertical-dist-between-tiles {
                height: 525px;
            }
            .blank{
                width:30px;
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
            .btn:hover{  
                shadow: 10px;
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
            
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 057 css*/
        .jssorb057 .i {position:absolute;cursor:pointer;}
        .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
        .jssorb057 .i:hover .b {stroke-opacity:.7;}
        .jssorb057 .iav .b {stroke-opacity: 1;}
        .jssorb057 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 073 css*/
        .jssora073 {display:block;position:absolute;cursor:pointer;}
        .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
        .jssora073:hover {opacity:.8;}
        .jssora073.jssora073dn {opacity:.4;}
        .jssora073.jssora073ds {opacity:.3;pointer-events:none;}
  

            
        </style>
        
    </head>
    <body > 
    
    <!-- background header and navigation included here    -->
    <?php require($DOCUMENT_ROOT . "navbar.php"); ?>
    <!-- navbar end -->
        
         
        <div style="background-color: rgb(0, 0, 0); color:rgb(0, 0, 0)">
            
            <div class="container-fluid" id="contain">                
                <br><br>
                <?php if($_SESSION['bookNotFound']==true): ?>
                    <p style="color:white">Search not found. Please try again.</p>
                    <script>console.log("work");</script>
                    <?php 
                        $_SESSION['bookNotFound']=false;
                    ?>
                <?php endif?>


<!-- carousel here -->
    <?php require($DOCUMENT_ROOT . "carousel.php"); ?>
<!-- carousel end -->


                <?php if($_SESSION["genre"]!="10"): ?>
                    <div>
                        <br>
                        <?php
                            $sql4 = "SELECT * FROM genre WHERE genre_id=".$_SESSION["genre"];
                            $result4 = mysqli_query($con,$sql4);
                            $row4 = mysqli_fetch_array($result4);
                            echo '          
                            <h3 style="color: white">'.$row4["genre_name"].'</h3>';
                            $sql2 = "SELECT * FROM book b, hasgenre g WHERE b.book_id=g.fk_book_id AND g.fk_genre_id= ".$_SESSION["genre"];
                            $result2 = mysqli_query($con,$sql2);
                            $num_books = mysqli_num_rows($result2);
                            for ($i=0; $i<$num_books; )
                            {
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
                                    // inserting datatype for filter correction
                                    echo '
                                        <form action="book.php" method="get">
                            
                                            <div data-eventtype="" class="col-sm-2 tile" name="bookID" type="submit" value="'.$bid.'" >
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
                    <div>
                        <br>
                        <?php
                            $sql2 = "SELECT * FROM book ";
                            $result2 = mysqli_query($con,$sql2);
                            $num_books = mysqli_num_rows($result2);
                            echo '<h3 style="color: white">Catalogue: </h3><br>';  
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
                <?php endif ?>
            </div>
        </div>   
    </body>
</html>