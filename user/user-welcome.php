<?php
session_start();
$page_no = "";
$total_records_per_page = 10;
$page_link = "user-welcome.php";


if (isset($_SESSION['username']) && $_SESSION['loggedinuser'] == TRUE) {

    include('../dbconnect.php');
    include('nav.php');

    //TO DISPLAY TABLES AND PAGENATION
    // if (isset($_GET["page_no"]) && $_GET['page_no'] != "") {
    //     $page_no  = $_GET["page_no"];
    // } else
    //     $page_no = 1;

} else {
    header("Location: ../user-login.php");
    exit();
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>User Welcome</title>
</head>
<style>
body{
    background-image: url(../Images/bg2.png);
    background-repeat: repeat;
}
</style>

<body>
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <center><strong><?php echo $_SESSION['message']; ?></strong></center>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php unset($_SESSION['message']) ?>
        </div>
    <?php endif ?>
    <center><br>
    <h1>Welcome to the Audio-library.</h1><br>
    <p style="font-size:20px;">Help: User can access songs using the top navigation bar and listen his/her favorite songs and add to his playlist.</p>
    <p style="font-size:20px;">Favorites can be added while listening to a new song and can be deleted from favorites page.</p><br><br>
    <h2>Enjoy great music</h2>
    <h4>Made by Sajan, Sagar and Rohit</h4>
    <h3><i>DBMS project &#169;IIITDMJ</i></h3>
    <center>
    <main>
    </main>
    <!-- <footer>
        <php
        include('../footer.php');
        ?>
    </footer> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php
    include("../footer.php");
    ?>
</body>


</html>