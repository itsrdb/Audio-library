<?php
session_start();
if (isset($_SESSION['adminname']) && $_SESSION['loggedinadmin'] == TRUE) {
    include('../dbconnect.php');

    if (isset($_POST['submit']) && $_POST['submit']) {

        $call = $_POST['submit'];

        if ($call == "Add-Genre") {

            $genre_type = $_POST['genre-type'];
            $insert = "INSERT INTO Genre (genre_type) VALUES ('$genre_type')";
            $result = mysqli_query($link, $insert);
            $_SESSION['message'] = "Genre Added";
        }

        if ($call == "Add-Artist") {
            $artist_name = $_POST['artist-name'];
            $insert = "INSERT INTO Artist (artist_name) VALUES ('$artist_name')";
            $result = mysqli_query($link, $insert);
            $_SESSION['message'] = "Artist Added";
        }


        if ($call == "Add-Album") {
            $artist_name = $_POST['artist-name'];
            $album_title = $_POST['album-title'];
            $release_year = $_POST['release-year'];

            $target_dir = "../Cover/";
            $target_file = $target_dir . basename($_FILES["album-cover"]["name"]);
           
            $artist_id;
            $qry = "SELECT * FROM Artist WHERE artist_name = '$artist_name' ";
            $result = mysqli_query($link, $qry);

            while ($row = mysqli_fetch_array($result)) {
                $artist_id = $row['id'];
            }

            $insert = "INSERT INTO Album (album_title,`Year`,artist_id,cover) 
                    VALUES ('$album_title','$release_year','$artist_id','$target_file')";
            $result = mysqli_query($link, $insert);
            $_SESSION['message'] = "Album Added";
        }

        if ($call == "Add-Track") {
            $songname = $_POST['song-name'];
            $album_title = $_POST['album-title'];
            $genre_type = $_POST['genre-type'];
            $release_date = $_POST['release-date'];

            $target_dir = "../mp3/";
            $target_file = $target_dir . basename($_FILES["song-file"]["name"]);

    
            $album_id;
            $gid;
            $qry = "SELECT * FROM Album WHERE album_title = '$album_title'";
            $result = mysqli_query($link, $qry);
            while ($row = mysqli_fetch_array($result)) {
                $album_id = $row['al_id'];
            }

            $qry = "SELECT * FROM Genre WHERE genre_type = '$genre_type'";
            $result = mysqli_query($link, $qry);
            while ($row = mysqli_fetch_array($result)) {
                $gid = $row['gid'];
            }

            $insert = "INSERT INTO Track (songname,Release_date ,album_id,genre_id,likes,audiopath) 
                    VALUES ('$songname', '$release_date' ,'$album_id','$gid',0,'$target_file')";
            $result = mysqli_query($link, $insert);
            $_SESSION['message'] = "Track Added";
        }
        header('Location: admin-welcome.php');
        exit();
    }
} else {
    header("Location: ../admin-login.php");
    exit();
}
?>
<html>