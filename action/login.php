<?php

if (isset($_POST['login-submit'])) {

  $username = $_POST['username'];
  $password = $_POST['pwd'];
    
    $link = mysqli_connect('localhost', 'root', '');
        if (!$link)
        {
            die('Failed to connect to server: ' . mysqli_error());
        }
        $db = mysqli_select_db($link, 'audio-library');
        if (!$db)
        {
            die("Unable to select database");
        }
    
        $qry = "SELECT * FROM adnim WHERE username = '$username'";

        /*Execute query*/ 
        $result = mysqli_query($link,$qry);
        if($row = mysqli_fetch_assoc($result)){
          $pwdCheck = password_verify($password, $row['pwd']);
          if($pwdCheck == false){
            header("Location: ../login-hostel_manager.php?error=wrongpwd");
            exit();
          }
          else if($pwdCheck == true) {

            echo "Successful";
            //session_start();
            /*$_SESSION['hostel_man_id'] = $row['Hostel_man_id'];
            $_SESSION['fname'] = $row['Fname'];
            $_SESSION['lname'] = $row['Lname'];
            $_SESSION['mob_no'] = $row['Mob_no'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['hostel_id'] = $row['Hostel_id'];
            $_SESSION['email'] = $row['Email'];
            $_SESSION['isadmin'] = $row['Isadmin'];
            $_SESSION['PSWD'] = $row['Pwd'];*/

            //Just for che
            //exit();
          }
          else {
            header("Location: ../login-hostel_manager.php?error=strangeerr");
            exit();
          }
    }
  }

else {
  header("Location: ../login-hostel_manager.php");
  exit();
}
