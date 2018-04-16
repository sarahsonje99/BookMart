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
elseif($_SESSION['usertype']=='seller'){
    header('location: home.php');
    exit();
}

if(isset($_POST['bookcartID'])){
    $bookcartid = $_POST['bookcartID'];
    $sql = "DELETE FROM booktocart WHERE booktocart_id = ".$bookcartid;
    echo $sql;
    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
    header("Location: cart.php");
    exit();
}
echo "No seller selected or available!";



?>