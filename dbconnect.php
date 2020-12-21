<?php
$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    die("Failed to connect to Server" . mysqli_error($link));
} 
$db = mysqli_select_db($link, 'dbmls');
if (!$db) {
    die("Unable to Connect database");
}
?>
