<?php
    session_start();
    $username = "root";
    $password = "";
    $database = "bookmart";
    $database2 = "bookmart2";
    $con = mysqli_connect("localhost",$username,$password,$database);
    $con2 = mysqli_connect("localhost", $username, $password, $database2 );
    
    if(!$con || !$con2){
        die("Connection failed: ".mysqli_connect_error());
    }

    if(isset($_GET['searchquery'])){
        $search = $_GET['searchquery'];
        $sql3 = "SELECT * FROM book WHERE book_name LIKE '%".$search."%' limit 1";

        $result4 = mysqli_query($con, $sql3);
        $result5 = mysqli_query($con2, $sql3);

        $searchrow1 = mysqli_fetch_array($result4);
        $searchrow2 = mysqli_fetch_array($result5);
       
        if(isset($searchrow1) || isset($searchrow2)){
            
            if(empty($searchrow1) && !empty($searchrow2)){
                $searchrow = $searchrow2;
            }
            else{
                $searchrow = $searchrow1;
            }

            // if(!$searchrow) {
            //     $_SESSION['bookNotFound'] = true;
            //     echo "booknotfoundtrue";
            //     // header('Location: home.php');
            //     exit();
            // }
            echo $searchrow['book_name'];
            header('Location: book.php?bookID='.$searchrow['book_id']) ;
            // print_r($result5);
            // print_r($result4);
            exit();
        }
        else{
            $_SESSION['bookNotFound'] = true;
            echo "booknotfoundtrue";

            header('Location: home.php');
            exit();
        }
    }

?> 