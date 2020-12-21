<!DOCTYPE html>
<html lang="en">
<style>
    .footer{
    margin-top: 5%;
    }

    .upper-footer {
        display: flex;
        justify-content: space-between;
        padding: 2%;
        margin-top: 3%;
        padding-left: 5%;
        padding-right: 5%;
        font-weight: bolder;
        background-color: black;
    }

    .upper-footer h3 {
        font-weight: bold;
        color: black;
    }

    ul {
        list-style-type: none;
    }

    .lower-footer {
        text-decoration-line: none;
        text-align: center;
        color: black;
        background-color: rgb(236, 183, 183);
    }

    .lower-footer a {
        font-family: 'Times New Roman', Times, serif;
        color: black;
        text-decoration: none;
    }

    .footer {
        background-color: rgb(211, 174, 174);
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <link rel="stylesheet" href="CSS/nav-bar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="footer">
        <div class="upper-footer">
            <div id="f-col1">
                <h3 style="font-weight:bold; color:white;">Reach Us</h3>
                <p>
                    <a target="_blank" href="">
                        <img src="../Images/twitter.png" height="30px" width="30px"></a>
                    <a target="_blank" href="">
                        <img src="../Images/facebook.png" height="30px" width="30px"></a>
                    <a target="_blank" href="">
                        <img src="../Images/mail.png" height="30px" width="30px"></a>
                    <p style="color:red;">
                    IIITDM Jabalpur<br>
                    DBMS Project<br>
                    B.Tech CSE 2ndYear</p>

                </p>
            </div>
            <div id="f-col1">
                <h3 style="color:white;">Quick Links</h3>
                <ul>
                    <li><a href="view-albums.php">Albums</a></li>
                    <li><a href="top20.php">Top20</a></li>
                    <li><a href="view-songs.php">All songs</a></li>
                </ul>
            </div>
            <div class="f-col1">
                <h3 style="color:white;">Send a message to admin</h3>
                <!-- <form action="<php $page_link ?>" method="post"> -->
                <form action="comment.php" method="post">
                    <textarea placeholder="Post your Comment Here ..." name="cmt" class="form-control custom-control" rows="3" style="resize:none"></textarea>
                    <?php echo "<input type='hidden' name='page-link' value=$page_link>
                    <button type='submit' name='post_comment' class='btn btn-primary' style='margin:1%'>
                        Post
                    </button>"
                    ?>
                </form>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>


<!-- 
            

            -->