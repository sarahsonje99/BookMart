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

if($_SESSION['user_id']){
    $sql1 = "SELECT * FROM customer c, booktocart bc, sells s, book b WHERE bc.in_buys=0 AND bc.fk_sells_id=s.sells_id AND b.book_id=s.fk_book_id AND c.customer_id=bc.fk_customer_id AND c.customer_id=".$_SESSION['user_id'];
    echo $sql1;
    $result1 = mysqli_query($con,$sql1);
    $num_books = mysqli_num_rows($result1);
    echo $num_books;
    $sql2 = "UPDATE booktocart SET in_buys = 1 WHERE fk_customer_id=".$_SESSION['user_id'];
    $result2 = mysqli_query($con,$sql2);
    echo $sql2;
    for( $i=0; $i<$num_books; $i++)
    {
        $row1 = mysqli_fetch_array($result1);
        $newAvail = $row1['avail']-1;
        $sql4 = "UPDATE sells SET avail = ".$newAvail." WHERE sells_id=".$row1['sells_id'];
        $result4 = mysqli_query($con,$sql4);
        $sql3 = "INSERT INTO buys(fk_booktocart_id, buy_price ) VALUES (".($row1["booktocart_id"]).", ".$row1['book_cost'].")";
        echo $sql3;
        $result3 = mysqli_query($con,$sql3);
        if ($result3) {
            echo "Record updated successfully";
        } 
        else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }


    
   
    header("Location: cart.php");
    exit();
}
echo "No seller selected or available!";



?>