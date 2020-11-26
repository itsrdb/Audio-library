<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>A-Library</title>
    <link rel="stylesheet" type="text/css" href="css/style-sign.css?v=<?php echo time(); ?>">
</head>
    
<body>
    <center><h1 class="heading" style="color: #000000;">Audio-library</h1></center>
    <div class="admin-login-form">
        <p class="sign" align="center" style="color:green;">User Sign-up</p>
        <form action="action/register.php" method="POST">
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
            <button class="sub-btn" type="submit" name="login-submit">Sign-up as new</button><br>
            <p class="ref-link"><center>Already a user? Click<a href="login-manager-user"> here</a>.</center></p>
        </form>
    </div>
    <div class="foo">
    <footer>
        <p><center> &copy; IIITDMJ DBMS-2020 Project. All Rights Reserved | Project link <a href="https://github.com/itsrdb/Audio-library">here</a>.</center></p>
    </footer>
    </div>
</body>