<?php

session_start();
$page_no = "";
$total_records_per_page = 10;
$page_link = "top20.php";
$genre;
if (isset($_SESSION['username']) && $_SESSION['loggedinuser'] == TRUE) {

    include('../dbconnect.php');
    include('nav.php');
} else {
    header("Location: ../user-login.php");
    exit();
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="CSS/data-tables.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>User Welcome</title>
</head>
<style>
    body {
        background-image: url(../Images/background1.jpg);
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
    <main>
        <div class="responsive-container">
            <?php
            echo '<center><table >
                <thead style="border-bottom:1px solid black">
                <td>Song name</td><td>Album Title</td><td>Artist Name</td><td>Add Favorite</td><td>Likes </td><td style="text-align: center;" >Play</td></thead>';

            $qry = "SELECT * FROM Track ORDER BY likes DESC LIMIT 0,20 ";
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
                <td align='center' ><a name='fav' href='favourites.php?add=$sid ' ><img src='../Images/fav.png' height=30px width=30px></a></td>
                <td >" . $likes . " <a name='vote' href='vote.php?sid=$sid ' ><img src='../Images/like.jpg' height=30px width=30px></a></td>
                <td style='text-align: right;' > 
                    <audio src='$path' controls></audio>
                </td>
                </tr>";
            }
            echo '</table></center>';
            echo '<hr style="border: 1px solid black" >';
            ?>
        </div>
    </main>
    <?php
    include("../footer.php");
    ?>
</body>
</html>
