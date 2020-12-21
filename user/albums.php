<?php

session_start();
$page_no = "";
$total_records_per_page = 3;
$page_link = "albums.php";
$albname;
$albid;
if (isset($_SESSION['username']) && $_SESSION['loggedinuser'] == TRUE) {

    include('../dbconnect.php');
    include('nav.php');

    if (isset($_GET["page_no"]) && $_GET['page_no'] != "") {
        $page_no  = $_GET["page_no"];
    } else
        $page_no = 1;

    if (isset($_GET['albname']) && $_GET['albname']) {
        $albname = htmlentities($_GET['albname']);

        //getting albumid to select songs from track table
        $result = mysqli_query($link, "SELECT * FROM Album WHERE album_title='$albname' ");
        $row = mysqli_fetch_array($result);
        $album_id =   $row['al_id'];
        $release_year = $row['Year'];
        $artist_id = $row['artist_id'];
        $coverpath = $row['cover'];

        //selecting artistname to display
        $result = mysqli_query($link, "SELECT * FROM Artist WHERE id='$artist_id' ");
        $row = mysqli_fetch_array($result);
        $artistname = $row['artist_name'];
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
    <link rel="stylesheet" href="CSS/album.css">
    <title>Albums</title>
</head>
<style>
    body {
        background-image: url("../Images/bg.jpg");
        background-repeat: no-repeat;
    }
</style>

<body>
    <main>
        <div class="container">
            <div class="left-container">
                <?php echo "<img id='profile-image' src='$coverpath' width=200 height=250 align=center>"; ?>
                <div class="info">

                    <strong><?php echo $artistname; ?></strong><br>
                    <strong><?php echo $release_year; ?></strong><br>
                </div>
            </div>
            <div class="right-container">
                <div class="content">
                    <?php echo "<h1></center>" . $albname . "</h1></center>"; ?>
                </div>
                <div class="responsive-container">
                    <?php
                    echo '<center><table>
                        <thead style="border-bottom:1px solid black">
                        <td >Song name</td><td>Favourite+</td><td  >Likes</td><td style="text-align: center;">Play</td></thead>';

                    $start_from = ($page_no - 1) * $total_records_per_page;
                    $qry = "SELECT * FROM Track WHERE album_id='$album_id' LIMIT $start_from, $total_records_per_page";
                    $result = mysqli_query($link, $qry);

                    while ($row = mysqli_fetch_array($result)) {
                        $songname = $row['songname'];
                        $likes = $row['likes'];
                        $date = $row['Release_date'];
                        $sid = $row['sid'];
                        $path = $row['audiopath'];

                        echo "<tr>
                        <td>" . $songname . "</td>
                        <td style='text-align: center;'><a name='fav' href='favourites.php?add=$sid ' ><img src='../Images/fav.png' height=30px width=30px ></a></td>
                        <td style='text-align: center;'>" . $likes . " <a name='vote' href='vote.php?sid=$sid ' ><img src='../Images/like.jpg' height=30px width=30px></a></td>
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
                        $cntqry = mysqli_query($link, "SELECT COUNT(*) FROM Track WHERE album_id='$album_id' ");
                        include('album-pagination.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include('../footer.php');
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>