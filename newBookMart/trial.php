<?php
    session_start();
    $username = "root";
    $password = "";
    $database = "bookmart";
    $con = mysqli_connect("localhost",$username,$password,$database);
    if(!$con){
        die("Connection failed: ".mysqli_connect_error());
    }
    

?>
<html>
<body>
<?php 
echo $_SESSION["user_id"];
?>

</body>
</html>