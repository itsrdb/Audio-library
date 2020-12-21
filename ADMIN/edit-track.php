<?php
session_start();
if (isset($_SESSION['adminname']) && $_SESSION['loggedinadmin'] == TRUE) {
	include('../dbconnect.php');
	include('nav.php');

	if (isset($_POST['submit']) && $_POST['submit']) {
		$sid = $_POST['song-id'];
		$songname =  $_POST['song-name'];
		$album_title = $_POST['album-title'];
		$genre_type = $_POST['genre-type'];
		$date = $_POST['release-date'];

		//updating song name if name is changed
		$qry = "UPDATE Track  SET songname= '$songname' WHERE `sid`='$sid' ";
		mysqli_query($link, $qry);

		//updating release date 
		$qry = "UPDATE Track  SET Release_date= '$date' WHERE `sid`='$sid' ";
		mysqli_query($link, $qry);

		//finding  albumid and setting it in place of album_id in track table
		$result = mysqli_query($link, "SELECT * FROM Album WHERE album_title='$album_title' ");
		while ($row = mysqli_fetch_array($result)) {
			$album_id = htmlentities($row['al_id']);
		}
		//updating album_id 
		$qry = "UPDATE Track  SET album_id= '$album_id' WHERE `sid`='$sid' ";
		mysqli_query($link, $qry);

		//finding  genre and setting it in place of genre_id in track table
		$result = mysqli_query($link, "SELECT * FROM Genre WHERE genre_type='$genre_type' ");
		while ($row = mysqli_fetch_array($result)) {
			$genre_id = htmlentities($row['gid']);
		}
		//updating album_id 
		$qry = "UPDATE Track  SET genre_id= '$genre_id' WHERE `sid`='$sid' ";
		mysqli_query($link, $qry);

		$_SESSION['message'] = "Track Updated";
		header('Location: view-track.php');
	}



	if (isset($_GET['del']) && $_GET['del']) {
		//have to delete every song where album id - $alb_id;
		$sid = $_GET['del'];
		$qry = "DELETE FROM Track WHERE `sid` = '$sid' ";
		mysqli_query($link, $qry);

		$_SESSION['message'] = "Track Deleted";
		header('Location: view-track.php');
	}
} else {
	header("Location: ../admin-login.php");
	exit();
}
?>
<html>
<style>
	table td {
		padding: 2%;
	}
</style>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/edit.css">
	<title>Edit Track</title>
</head>

<body>
	<?php
	if (isset($_GET['edit']) && $_GET['edit']) {
		//have to delete every song where album id - $alb_id;
		$sid = $_GET['edit'];
		$result = mysqli_query($link, "SELECT * FROM Track WHERE `sid`='$sid' ");

		$n = mysqli_fetch_array($result);
		$songname = $n['songname'];
		$album_id = $n['album_id'];
		$genre_id = $n['genre_id'];
		$date = $n['Release_date'];

		$result = mysqli_query($link, "SELECT * FROM Album WHERE al_id='$album_id' ");
		while ($row = mysqli_fetch_array($result)) {
			$album_title = htmlentities($row['album_title']);
		}

		$result = mysqli_query($link, "SELECT * FROM Genre WHERE gid='$genre_id' ");
		while ($row = mysqli_fetch_array($result)) {
			$genre_type = htmlentities($row['genre_type']);
		}

		echo "<form action='edit-track.php' method='post'>
            <div class='form-head'>
                <h3>Add Song</h3>
            </div>
            <div class='content'>
                <table>
                    <tr>
                        <input type='hidden' name='song-id' value= '$sid'>
                        <td colspan=2> Song Name* : <input type='text' name='song-name' required='required'  value= '$songname'></td>
                    </tr>
                    <tr>
                        <td>Album Title* :<br><input type='text' name='album-title' list='all-album'  value= '$album_title' >
                        </td>
                        <td> Genre Type* :<br><input type='text' name='genre-type' list='all-genre'  value= '$genre_type'>
                        </td>
						<td> Release Dt* :<br><input type='date' name='release-date'  value= '$date'>
                        </td>
                    </tr>
                </table>
            </div>
            
            <input class='update-btn' type='submit' name='submit' value='Update' />";
		$qry = "SELECT * FROM Album ";
		$result = mysqli_query($link, $qry);
		echo "<datalist id=all-album>";
		while ($row = mysqli_fetch_array($result)) {
			$opt = htmlentities($row['album_title']);
			echo "<option value='$opt' >";
		}
		echo "</datalist>";

		$qry = "SELECT * FROM Genre ";
		$result = mysqli_query($link, $qry);
		echo "<datalist id=all-genre>";
		while ($row = mysqli_fetch_array($result)) {
			$opt = htmlentities($row['genre_type']);
			echo "<option value='$opt' >";
		}
		echo "</datalist>
        </form>";
	}

	?>
</body>

</html>