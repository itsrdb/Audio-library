<?php

if(isset($_POST['login-submit'])) {
    require 'config.php';
    $result = mysqli_query($conn,"SELECT * FROM users WHERE username='" . $_POST["username"] . "' AND password = '". $_POST["pwd"]."'");
    $count = mysqli_num_rows($result);
    if($count==0) {
        echo "Nope";
    } else {
        echo "Hello";
    }
}else{
    
}
?>