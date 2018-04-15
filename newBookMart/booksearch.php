<?php
    // session_start();
    $username = "root";
    $password = "";
    $database = "bookmart";
    $con = mysqli_connect("localhost",$username,$password,$database);
    if(!$con){
        die("Connection failed: ".mysqli_connect_error());
    }
    if(isset($_POST['searchquery'])){
        $search = $_POST['searchquery'];
        $sql3 = "SELECT * FROM book WHERE book_name LIKE '%".$search."%' limit 1";
        $result4 = mysqli_query($con, $sql3);
        if(!empty($result4)){
            $searchrow = mysqli_fetch_array($result4);
            header('Location: book.php?bookID='.$searchrow['book_id']) ;
            print_r($result4);
        }
        else{
            print_r($result4);
            $_SESSION['bookNotFound'] = true;
            print_r($_SESSION['bookNotFound']);
            // header('Location: home.php');
        }
    }

?> 