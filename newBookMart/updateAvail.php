<?php
session_start();

$username = "root";
$password = "";
$database = "bookmart";
$con = mysqli_connect("localhost",$username,$password,$database);
if(!$con){
    die("Connection failed: ".mysqli_connect_error());
}


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: home.php');
    exit();
}
elseif($_SESSION['usertype']=='customer'){
    header('location: home.php');
    exit();
}
if(isset($_GET['updatedValue'])){
    $bookid = $_GET['bookID'];
    $avail = $_GET['updatedValue'];
    echo "hi";
    $sql = "UPDATE sells SET avail = ".$avail." WHERE fk_book_id =".$bookid." AND fk_seller_id =".$_SESSION['user_id'];
    echo $sql;
    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
    header('location: shelf.php');
    exit();
}



?>