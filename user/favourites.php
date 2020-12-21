<?php

session_start();
$page_no = "";
$total_records_per_page = 10;
$page_link = "categories.php";
$genre;
if (isset($_SESSION['username']) && $_SESSION['loggedinuser'] == TRUE) {

    include('../dbconnect.php');
    include('nav.php');
    $uname = $_SESSION['username'];
    $result = mysqli_query($link, "SELECT * FROM Clients WHERE username='$uname' ");
    $n = mysqli_fetch_array($result);
    $userid = $n['sno'];

    if (isset($_GET["page_no"]) && $_GET['page_no'] != "") {
        $page_no  = $_GET["page_no"];
    } else
        $page_no = 1;

    if (isset($_GET['add']) && $_GET['add']) {
        $songid = $_GET['add'];
        $qry = "INSERT INTO Favourite(userid,songid) VALUES( '$userid' , '$songid' )";
        mysqli_query($link, $qry);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if (isset($_GET['rem']) && $_GET['rem']) {
        $songid = $_GET['rem'];
        $qry = "DELETE FROM Favourite WHERE userid='$userid' AND songid=$songid ";
        mysqli_query($link, $qry);

        $_SESSION['message'] = "Removed From Favourites";
    }
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
    <link rel="stylesheet" href="CSS/data-tables.css?v=<?php echo time(); ?>">
    <title>User Welcome</title>
</head>
<style>
    body {
        background-image: url(../Images/background.jpg);
        height: 100%;
        background-position: center;
        background-repeat: repeat;
        background-size: cover;
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
    <main>
        <div class="responsive-container">
            <?php
            echo '<center><table >
                <thead style="border-bottom:1px solid black">
                <td>Song name</td><td>Album Title</td><td>Artist Name</td><td>Remove- </td><td>Likes </td><td style="text-align: center;">Play</td></thead>';

            $start_from = ($page_no - 1) * $total_records_per_page;
            $qry = "SELECT * FROM Favourite,Track WHERE userid='$userid' AND songid=`sid`
                     LIMIT $start_from, $total_records_per_page";
            $result = mysqli_query($link, $qry);

            while ($row = mysqli_fetch_array($result)) {
                $songname = $row['songname'];
                $album_id = $row['album_id'];
                $likes = $row['likes'];
                $sid = $row['sid'];
                $path = $row['audiopath'];


                $albres = mysqli_query($link, "SELECT * FROM Album WHERE al_id = '$album_id' ");
                $name = mysqli_fetch_array($albres);
                $album_title = $name['album_title'];
                $artist_id = $name['artist_id'];

                $artres = mysqli_query($link, "SELECT * FROM Artist WHERE id = '$artist_id' ");
                $art = mysqli_fetch_array($artres);
                $artistname = $art['artist_name'];


                echo "<tr>
                <td>" . $songname . "</td>
                <td> <a href='albums.php?albname=$album_title '> " . $album_title . "</a> </td>
                <td >" . $artistname . "</td>
                <td ><a name='remove' href='favourites.php?rem=$sid ' ><img src='../Images/rem.png' height=30px width=30px></a></td>
                <td >" . $likes . " <a name='vote' href='vote.php?sid=$sid ' ><img src='../Images/like.jpg' height=30px width=30px></a></td>
                <td style='text-align: right;' > 
                    <audio src='$path' controls></audio>
                </td>
                </tr>";
            }
            echo '</table></center>';

            echo '<hr style="border: 1px solid black" >';
            ?>

            <div class="pagination">
                <?php
                $cntqry = mysqli_query($link, "SELECT COUNT(*) FROM Favourite WHERE userid='$userid' ");
                include('pagination.php');
                ?>
            </div>
        </div>
    </main>
    <!-- <php
    include('../footer.php');
    ?> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php
    include("../footer.php");
    ?>
</body>

</html>