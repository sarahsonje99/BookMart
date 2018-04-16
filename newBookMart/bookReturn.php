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

if(isset($_POST['buyID'])){
    $buyid = $_POST['buyID'];
    $sql = "INSERT INTO returned (fk_buy_id, day) VALUES (".$buyid.", '2018-04-17')";
    echo $sql;
    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
    header("Location: orders.php");
    exit();
}
echo "No seller selected or available!";



?>