<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>A-Library</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
</head>
    
<body>
    <center><h1 class="heading" style="color: #000000;">Audio-library</h1></center>
    <div class="admin-login-form">
        <p class="sign" align="center" style="color:teal;">User Login</p>
        <form action="action/login-user.php" method="POST">
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
            <p class="ref-link"><center>To sign up click<a href="sign-up"> here</a>.</center></p>
        </form>
    </div>
    <div class="foo">
    <footer>
        <p><center> &copy; IIITDMJ DBMS-2020 Project. All Rights Reserved | Project link <a href="https://github.com/itsrdb/Audio-library">here</a>.</center></p>
    </footer>
    </div>
</body>
</html>