<?php
    session_start();
    $username = "root";
    $password = "";
    $database = "bookmart";
    $con = mysqli_connect("localhost",$username,$password,$database);
    if(!$con){
        die("Connection failed: ".mysqli_connect_error());
    }
    $sql = "SELECT * FROM book WHERE book_id=12";
    $result = mysqli_query($con,$sql);
    if(!empty($result)){
        $row = mysqli_fetch_assoc($result);
        // $sql = "SELECT * FROM hasgenre WHERE fk_book_id=12";
        $sql = "SELECT genre_name FROM genre WHERE genre_id IN (SELECT fk_genre_id FROM hasgenre WHERE fk_book_id = 14)";
        $gen = mysqli_query($con, $sql);
        // if(!empty($gen)){
            $genres = mysqli_fetch_assoc($gen);
            $gcount = mysqli_num_rows($genres);
        // }        
    }

?>
<html>
<body>
<?php 
    // foreach($genres as $g){
        // print_r($g);
    // }
        echo $gcount;
        // echo "<table><tr><td>".($row_users['email'])."</td></tr>";

    
?>

</body>
</html>