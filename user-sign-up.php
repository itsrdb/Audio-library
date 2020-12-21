<?php
$inserted = FALSE;
$showerror =FALSE;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include('dbconnect.php');
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $exist = FALSE;

    //checking whether username already exists in table 
    $existuser = "SELECT * FROM Clients WHERE username='$username' ";
    $result = mysqli_query($link, $existuser);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        //username already present;
        $exist = TRUE;
        $showerror =" Username already Exists. Choose a different username. Try to be Unique!! ";

    }

    if ($exist == FALSE) {
        $qry = "INSERT INTO `Clients` (`username`, `Fname`, `Lname`, `Email`, `Pwd`,`dt`)
             VALUES ('$username', '$fname', '$lname', '$email', '$password',current_timestamp()) ";
        $result = mysqli_query($link, $qry);
        if ($result == TRUE)
            $inserted = TRUE;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>A-Library</title>
    <link rel="stylesheet" type="text/css" href="css/style-sign.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <?php
    if ($inserted)
        echo '<div class="alert alert-success" role="alert">
            Successfully Registered!!. Click this link to Login Yourself <a href="user-login.php" class="alert-link">Link</a>. Enjoy !!
            </div>';
    if ($showerror) {
        echo '<div class="alert alert-danger" role="alert">
                Something\'s Wrong !!'. $showerror .'</div>';
    }
    ?>
    <center>
        <h1 class="heading" style="color: #000000;">Audio-library</h1>
    </center>
    <div class="admin-login-form">
        <p class="sign" align="center" style="color:#194a50;">User Sign-up</p>
        <form action="user-sign-up.php" method="POST">
            <div class="form-group">
                First name:
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="text" class="form-control" name="fname" placeholder="" required="required" />
                </div>
            </div>
            <div class="form-group">
                Last name:
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="text" class="form-control" name="lname" placeholder="" required="required" />
                </div>
            </div>
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
            <div class="form-group">
                Email:
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="email" class="form-control" name="email" placeholder="" required="required" />
                </div>
            </div>
            <button class="sub-btn" type="submit" name="signup-submit">Sign-up as new</button><br>
            <p class="ref-link">
                <center>Already a user? Click<a href="user-login.php"> here</a>.</center>
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