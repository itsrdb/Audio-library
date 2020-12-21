<?php
$isadmin = FALSE;
$showerror = FALSE;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include('dbconnect.php');
    $adminname = $_POST['username'];
    $password = $_POST['pwd'];

    //checking whether username already exists in table 
    $isvalidadmin = "SELECT * FROM Admins WHERE Admin_name ='$adminname' AND Pwd = '$password' ";
    $result = mysqli_query($link, $isvalidadmin);
    $numrows = mysqli_num_rows($result);

    if ($numrows == 1) {
        //username is present so we can login;
        $isadmin = TRUE;
        session_start();
        $_SESSION['loggedinadmin'] = TRUE;
        $_SESSION['adminname'] = $adminname;
        header("Location: ADMIN/admin-welcome.php");
    } else {
        $isvaliduser = "SELECT * FROM Admins WHERE Admin_name='$adminname' ";
        $result = mysqli_query($link, $isvaliduser);
        $numrows = mysqli_num_rows($result);
        if ($numrows == 1) {
            $showerror = " Passwords don't match. Try again !! ";
        } else {
            $showerror = " NO such Admin Exists. Register yourself First !! ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>A-Library</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php
    if ($showerror) {
        echo '<div class="alert alert-danger" role="alert">
                Something\'s Wrong !!' . $showerror . '</div>';
    }
    ?>
    <center>
        <h1 class="heading" style="color: #000000;">Audio-library</h1>
    </center>
    <div class="admin-login-form">
        <p class="sign" align="center" style="color:teal;">Admin Login</p>
        <form action="admin-login.php" method="POST">
            <div class="form-group">
                Username:
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="username" placeholder="" required="required" />
                </div>
            </div>
            <div class="form-group">
                Password:
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="pwd" placeholder="" required="required" />
                </div>
            </div>
            <button class="sub-btn" type="submit" name="login-submit">Login</button><br>
            <p class="ref-link">
                <center>User login? Click<a href="user-login.php"> here</a>.</center>
            </p>
        </form>
    </div>
    <div class="foo">
        <footer>
            <p>
                <center> &copy; IIITDMJ DBMS-2020 Project. All Rights Reserved | Project link <a href="https://github.com/itsrdb/Audio-library">here</a>.</center>
            </p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>