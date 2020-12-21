<?php
    session_start();
    session_unset();
    session_destroy();
  
    echo "will redirect to login page in 1 seconds";
    header('Refresh: 1; URL=user-login.php');
?>