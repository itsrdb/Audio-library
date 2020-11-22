<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>A-Library</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
    
<body>
    <h1>Audio-library System</h1>
    <div class="admin-login-form">
        <h2>Admin Login</h2>
        <form action="includes/login-hm.inc.php" method="POST">
            <div class=" w3l-form-group">
                <label>Username:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="username" placeholder="Username" required="required" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required="required" />
                </div>
            </div>
            <!--<div class="forgot">
                <a href="#">Forgot Password?</a>
                <p><input type="checkbox">Remember Me</p>
            </div>-->
            <button type="submit" name="login-submit">Login</button>
        </form>
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2018 DBMS Project. All Rights Reserved | Design by <a href="https://www.linkedin.com/in/bharat-reddy/">Bharat-Prajwal-Rakesh</a></p>
    </footer>
</body>