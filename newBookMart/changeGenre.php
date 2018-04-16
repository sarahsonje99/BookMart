<?php
session_start();
// echo "hi!";
// exit();
if(isset($_POST['genreq'])){
$_SESSION['genre'] = $_POST['genreq'];
echo $_SESSION['genre'];
header('Location: home.php');


}
else{
    echo 'kjhgfd';
}
?>