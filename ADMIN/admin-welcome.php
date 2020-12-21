<?php
session_start();

if (isset($_SESSION['adminname']) && $_SESSION['loggedinadmin'] == TRUE) {
    include('../dbconnect.php');
    include('nav.php');
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
    <link rel="stylesheet" href="CSS/welcome.css">
    <title>Welcome <?php echo $_SESSION['adminname']; ?></title>
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

    .add-btn {
        text-decoration: none;
        padding: 2px 5px;
        background: green;
        color: white;
        font-weight: bolder;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        border-radius: 5px;
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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <center><strong><?php echo $_SESSION['message']; ?></strong></center>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php unset($_SESSION['message']) ?>
        </div>
    <?php endif ?>
    <main>

        <form action="add.php" method="post">
            <div class="form-head">
                <h3>Add Genre</h3>
            </div>
            <div class="content">
                <table>
                    <tr>
                        <td> Genre Type* :<input type="text" name="genre-type" list="all-genre" required="required">
                        </td>
                    </tr>
                </table>
            </div>
            <input class="add-btn" type="submit" name="submit" value="Add-Genre" />
        </form>

        <form action="add.php" method="post">
            <div class="form-head">
                <h3>Add Artist</h3>
            </div>
            <div class="content">
                <table>
                    <tr>
                        <td> Artist Name* :<input type="text" name="artist-name" list="all-artist" required="required">
                        </td>
                    </tr>
                </table>
            </div>
            <input class="add-btn" type="submit" name="submit" value="Add-Artist" />
        </form>

        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="form-head">
                <h3>Add Album</h3>
            </div>
            <div class="content">
                <table>
                    <tr>
                        <td>Album Title* :<br><input type="text" name="album-title" list="all-album" required="required">
                        </td>
                        <td> Artist Name* :<br><input type="text" name="artist-name" list="all-artist" required="required">
                        </td>
                    </tr>
                    <tr>
                        <td> Release Year* :<br><input type="number" name="release-year" required="required">
                        </td>
                        <td>Album Cover* :<br><input type="file" name="album-cover" id="album-cover" required="required"></td>
                    </tr>
                </table>
            </div>
            <input class="add-btn" type="submit" name="submit" value="Add-Album" />
        </form>

        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="form-head">
                <h3>Add Song</h3>
            </div>
            <div class="content">
                <table>
                    <tr>
                        <td colspan="2"> Song Name* : <input type="text" name="song-name" required="required"></td>
                    </tr>
                    <tr>
                        <td>Album Title* :<br><input type="text" name="album-title" list="all-album" required="required">
                        </td>
                        <td> Genre Type* :<br><input type="text" name="genre-type" list="all-genre" required="required">
                        </td>
                    </tr>
                    <tr>
                        <td>Release Date* :<br><input type="date" name="release-date" required="required">
                        </td>
                        <td>Song File* :<br><input type="file" name="song-file" id="song-file" required="required"></td>
                    </tr>
                </table>
            </div>
            <input class="add-btn" type="submit" name="submit" value="Add-Track" />
            <?php include('option.php'); ?>
        </form>


    </main>

</body>

</html>