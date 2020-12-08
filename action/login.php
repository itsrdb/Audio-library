<?php

if(isset($_POST['login-submit'])) {
    require 'config.php';
    $result = mysqli_query($conn,"SELECT * FROM admin WHERE username='" . $_POST["username"] . "' and password = '". $_POST["pwd"]."'");
    $count = mysqli_num_rows($result);
    if($count==0) {
        echo "Nope";
    } else {
        echo "Hello<br>";
        $message = "You are successfully authenticated!";
        echo $message;
    }
}else{
    
}
?>