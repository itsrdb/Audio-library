<?php
session_start();
if (isset($_POST['signup-submit'])) {

	require 'config.php';
	$username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $exist = FALSE;

    $existuser = "SELECT * FROM users WHERE username='$username' ";
    $result = mysqli_query($conn, $existuser);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        //username already present;
        $exist = TRUE;
        $showerror =" Username already Exists. Choose a different username. Try to be Unique!! ";
    }

    if ($exist == FALSE) {
        $qry = "INSERT INTO `users` (`username`, `fname`, `lname`, `email`, `pwd`,`dt`)
             VALUES ('$username', '$fname', '$lname', '$email', '$password', current_timestamp()) ";
        $result = mysqli_query($conn, $qry);
        if ($result == false) echo mysqli_error($conn) . '<br>';
            else echo 'Registered successfully! ';
    }
}
?>