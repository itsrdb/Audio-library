<!DOCTYPE html>
<html lang="en">
<style>
    .header {
        padding-top: 1%;
        padding-left: 10px;
        background-color: black;
    }

    #logo {
        margin: 0 0 3px 0;
    }

    #access li {
        margin: 0 0 3px 0;
    }

    nav a {
        color: black;
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
        font-size: larger;
    }

    nav a:hover {
        color: black;
        text-decoration: none;
    }

    nav ul {
        list-style: none;
    }

    nav ul li:hover {
        background: #48D1CC;
    }

    nav ul li {
        float: left;
        background-color: grey;
        border-radius: 20px;
        width: 150px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        position: relative;
    }

    nav ul ul {
        display: none;
    }

    nav ul li:hover>ul {
        display: block;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <div class="navbar">
            <div class="logo">
                <a href="user-welcome.php"><img id="logo" src="../Images/logo1.png" height="70px" width="200px"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="top20.php">Top</a></li>
                    <li><a href="view-songs.php">All Songs</a></li>
                    <li><a href="favourites.php">Favourites</a></li>
                    <li><a href="view-albums.php">Albums</a></li>
                    <li><a href="#">Categories</a>
                        <ul class="dropdown">
                            <?php
                            $result = mysqli_query($link, "SELECT * FROM Genre");
                            while ($row = mysqli_fetch_array($result)) {
                                $genre = $row['genre_type'];
                                echo "<li><a href='categories.php?genre=$genre' > $genre </a></li>";
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="../logout.php">Log out</a></li>
                </ul>
            </nav>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>