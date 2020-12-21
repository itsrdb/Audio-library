<?php
session_start();

if (isset($_SESSION['username']) && $_SESSION['loggedinuser'] == TRUE) {

    include('../dbconnect.php');
    if (isset($_GET['sid']) && $_GET['sid']) {

        $sid = $_GET['sid'];
        $result = mysqli_query($link, "UPDATE Track SET likes= likes+1 WHERE `sid` = $sid ");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
} else {
    header("Location: ../user-login.php");
    exit();
}
?>
<html>

</html>