<?php
session_start();

$page_no = "";
$total_records_per_page = 1;  // change the number to show that many records in table
$page_link = "view-track.php";

if (isset($_SESSION['adminname']) && $_SESSION['loggedinadmin'] == TRUE) {
    include('../dbconnect.php');
    include('nav.php');

    if (isset($_GET["page_no"]) && $_GET['page_no'] != "") {
        $page_no  = $_GET["page_no"];
    } else
        $page_no = 1;
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
    <link rel="stylesheet" href="CSS/temp-data-table.css">
    <title>View Users</title>
</head>
<style>
    body {
        /* background-color: darkgray; */
        background-image: url('../Images/bg.jpg');
    }

    main {
        min-height: 100%;
        margin: 2%;
    }

    .del-btn {
        text-decoration: none;
        padding: 2px 5px;
        background: red;
        color: white;
        border-radius: 3px;
    }

    .edit-btn {
        text-decoration: none;
        padding: 2px 5px;
        background: yellow;
        color: black;
        border-radius: 3px;
    }

    .fade {
        color: black;
        background-color: rgb(12, 451, 56);
    }

    .show {
        margin-left: 30%;
        margin-right: 30%;
        width: 40%;
    }
</style>

<body>
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
                <td>Song name</td><td>Album Title</td><td>Genre</td><td>Release Dt</td><td>Edit</td><td>Delete</thead>';

            $start_from = ($page_no - 1) * $total_records_per_page;
            $qry = "SELECT * FROM Track ORDER BY songname DESC LIMIT $start_from, $total_records_per_page";
            $result = mysqli_query($link, $qry);

            while ($row = mysqli_fetch_array($result)) {
                $songname = $row['songname'];
                $album_id = $row['album_id'];
                $genre_id = $row['genre_id'];
                $date = $row['Release_date'];
                $sid = $row['sid'];

                $albres = mysqli_query($link, "SELECT * FROM Album WHERE al_id = '$album_id' ");
                $name = mysqli_fetch_array($albres);
                $album_title = $name['album_title'];

                $genres = mysqli_query($link, "SELECT * FROM Genre WHERE gid = '$genre_id' ");
                $name = mysqli_fetch_array($genres);
                $genre_type = $name['genre_type'];

                echo "<tr>
                <td>" . $songname . "</td>
                <td>" . $album_title . "</td>
                <td >" . $genre_type . "</td>
                <td >" . $date . "</td>
                <td>
                
                <a class= 'edit-btn' name='edit' href='edit-track.php?edit=$sid ' >Edit</a></td>
                <td> 
                <a class= 'del-btn' name='delete' href='edit-track.php?del=$sid ' >Delete</a>
                </td>
                </tr>";
            }
            echo '</table></center>';

            echo '<hr style="border: 1px solid black" >';
            ?>

            <div class="pagination">
                <?php
                $cntqry = mysqli_query($link, "SELECT COUNT(*) FROM Track");
                include('pagination.php');
                ?>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>