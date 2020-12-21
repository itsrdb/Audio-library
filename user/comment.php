<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['loggedinuser'] == TRUE) {
    include('../dbconnect.php');

    $cmt = $_POST['cmt'];
    $page_link = $_POST['page-link'];

    $commentor = $_SESSION['username'];
    $qry = "SELECT Email FROM Clients WHERE username='$commentor' ";
    $result = mysqli_query($link, $qry);
    $row = mysqli_fetch_array($result);
    $email = $row['Email'];

    $qry = "INSERT INTO `Comments` (`user`, `comment`, `Email`, `date`) 
        VALUES ('$commentor', '$cmt', '$email', current_timestamp());";
    $result = mysqli_query($link, $qry);
    $_SESSION['message'] = "Comment Added";

    header("Location: $page_link ");
} else {
    header("Location: ../user-login.php");
    exit();
}
?>
<html>