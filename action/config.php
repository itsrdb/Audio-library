<?php
  $dBName = 'audio-library';
  // session_start();
  $conn=mysqli_connect('localhost', 'root', '');
  if (!$conn) {
    die("Connection Failed: ".mysqli_error($conn));
  }

  $db = mysqli_select_db($conn, 'audio-library');
  if (!$db)
  {
    die("Unable to select database");
  }
?>
