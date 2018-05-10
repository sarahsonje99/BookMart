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
    $sql = 'INSERT INTO returned (fk_buy_id) VALUES ('.$buyid.')';
    $sql1 = 'SELECT ss.fk_seller_id FROM buys b, booktocart bc, sells ss WHERE b.fk_booktocart_id=bc.booktocart_id AND bc.fk_sells_id=ss.sells_id';
    echo $sql;
    echo $sql1;
    $check1 = mysqli_query($con, $sql);
    $check2 = mysqli_query($con, $sql1);
    $row = mysqli_fetch_array($check2);
    $sql2 = 'UPDATE sells SET avail=avail+1 WHERE sells_id='.$row["fk_seller_id"];
    
    $check3 = mysqli_query($con, $sql2);
    if ($check1 && $check2 && $check3) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
    header("Location: orders.php");
    exit();
}
echo "No seller selected or available!";



?>