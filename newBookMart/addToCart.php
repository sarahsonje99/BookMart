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

if(isset($_POST['addtocart_sells'])){
    //$bookid = $_GET['bookID'];
    $sellsID = $_POST['addtocart_sells'];
    echo "hi";
    $sql = "INSERT INTO booktocart(fk_customer_id, fk_sells_id) VALUES (".($_SESSION["user_id"]).",".$sellsID.")";
    echo $sql;
    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
    header("Location: ". $_SERVER["HTTP_REFERER"]);
    exit();
}
echo "No seller selected or available!";



?>