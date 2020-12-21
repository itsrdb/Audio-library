<?php

session_start();
$page_no = "";
$total_records_per_page = 6;
$page_link = "view-albums.php";

if (isset($_SESSION['username']) && $_SESSION['loggedinuser'] == TRUE) {

    include('../dbconnect.php');
    include('nav.php');

    if (isset($_GET["page_no"]) && $_GET['page_no'] != "") {
        $page_no  = $_GET["page_no"];
    } else
        $page_no = 1;
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
    <link rel="stylesheet" href="CSS/v-albums.css?v=<?php echo time(); ?>">
    <title>View-Albums</title>
</head>
<style>
</style>

<body>
    <main>
        <div align="center" class="container">
            <?php
            $cntqry = mysqli_query($link, "SELECT COUNT(*) FROM Album");
            $rows = mysqli_fetch_row($cntqry);
            $total_records = $rows[0];
            $total_pages = ceil($total_records / $total_records_per_page);
            $prev_page = $page_no - 1;
            $next_page = $page_no + 1;
            $pagLink = "";
            if ($page_no > 1) {
                $pagLink = "<a id='page-link' href='$page_link?page_no=$prev_page'>" . " << " . "</a>";
                echo $pagLink;
            }
            ?>
            <div id="categories" class="display-albums">

                <?php
                $start_from = ($page_no - 1) * $total_records_per_page;
                $qry = "SELECT * FROM Album ORDER BY Year LIMIT $start_from, $total_records_per_page ";
                $result = mysqli_query($link, $qry);

                while ($row = mysqli_fetch_array($result)) {
                    $album_id =   $row['al_id'];
                    $album_name = $row['album_title'];
                    $release_year = $row['Year'];
                    $artist_id = $row['artist_id'];
                    $coverpath = $row['cover'];

                    $artres = mysqli_query($link, "SELECT * FROM Artist WHERE id='$artist_id' ");
                    $row = mysqli_fetch_array($artres);
                    $artistname = $row['artist_name'];

                    echo "<span class='slide'>
                        <a href='albums.php?albname=$album_name '><img src='$coverpath' id='cover-photo' width=200 height=250 ></a>
                        <br>
                        <div class=info>
                        <strong> Album Title: </strong> $album_name  <br>
                        <strong> Artist Name: </strong> $artistname  <br>
                        <strong> Release Year: </strong> $release_year  <br>  
                        </div>       
                </span>";
                }
                ?>
            </div>
            <?php
            if ($page_no < $total_pages) {
                $pagLink = "<a id='page-link' href='$page_link?page_no=$next_page'>" . " >>" . "</a>";
                echo $pagLink;
            }

            ?>
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