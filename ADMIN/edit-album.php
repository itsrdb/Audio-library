<?php
session_start();
if (isset($_SESSION['adminname']) && $_SESSION['loggedinadmin'] == TRUE) {
    include('../dbconnect.php');
    include('nav.php');

    if (isset($_POST['submit']) && $_POST['submit']) {
        $id = $_POST['album-id'];
        $name =  $_POST['artist-name'];
        $title = $_POST['album-title'];
        $year = $_POST['release-year'];

        //updating album name if name is changed
        $qry = "UPDATE Album  SET album_title= '$title' WHERE al_id='$id' ";
        mysqli_query($link, $qry);

        //updating release year
        $qry = "UPDATE Album  SET `Year`= '$year' WHERE al_id='$id' ";
        mysqli_query($link, $qry);
        //finding  artistid and setting it in place of artist_id in album table
        $result = mysqli_query($link, "SELECT * FROM Artist WHERE artist_name='$name' ");
        while ($row = mysqli_fetch_array($result)) {
            $artist_id = htmlentities($row['id']);
        }
        //updating artist_id 
        $qry = "UPDATE Album  SET artist_id= '$artist_id' WHERE al_id='$id' ";
        mysqli_query($link, $qry);
        $_SESSION['message'] = "Album Updated";
        header('Location: view-album.php');
    }



    if (isset($_GET['del']) && $_GET['del']) {
        //have to delete every song where album id - $alb_id;
        $alb_id = $_GET['del'];
        $qry = "DELETE FROM Track WHERE album_id = '$alb_id' ";
        mysqli_query($link, $qry);

        //deleting album        
        $alb_id = $_GET['del'];
        $qry = "DELETE FROM Album WHERE al_id = '$alb_id' ";
        mysqli_query($link, $qry);
        $_SESSION['message'] = "Album Deleted";
        header('Location: view-album.php');
    }
} else {
    header("Location: ../admin-login.php");
    exit();
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/edit.css">
    <title>Edit Album</title>
</head>

<body>
    <?php
    if (isset($_GET['edit']) && $_GET['edit']) {
        //have to delete every song where album id - $alb_id;
        $alb_id = $_GET['edit'];
        $result = mysqli_query($link, "SELECT * FROM Album WHERE al_id='$alb_id' ");

        $n = mysqli_fetch_array($result);
        $album_title = $n['album_title'];
        $artist_id = $n['artist_id'];
        $release_year = $n['Year'];

        $result = mysqli_query($link, "SELECT * FROM Artist WHERE id='$artist_id' ");
        while ($row = mysqli_fetch_array($result)) {
            $artist_name = htmlentities($row['artist_name']);
        }

        echo "<form action='edit-album.php' method='post' >
            <div class='form-head'>
                <h3>Edit Album</h3>
            </div>
            <div class='content'>
                <table>
                    <tr>
                        <input type='hidden' name='album-id' value= '$alb_id'>
                        <td>Album Title* :<br><input type=text name=album-title list='all-album' value= '$album_title'>
                        </td>
                        <td> Artist Name* :<br><input type=text name=artist-name list='all-artist' value= '$artist_name' >
                        </td>
                        <td> Release Year* :<br><input type=number name=release-year  value= '$release_year' >
                        </td>
                    </tr>
                </table>
            </div>
            
            <input class='update-btn' type='submit' name='submit' value='Update' />";
        $qry = "SELECT * FROM Artist ";
        $result = mysqli_query($link, $qry);
        echo "<datalist id=all-artist>";
        while ($row = mysqli_fetch_array($result)) {
            $opt = htmlentities($row['artist_name']);
            echo "<option value='$opt' >";
        }
        echo "</datalist>
        </form>";
    }

    ?>
</body>

</html>