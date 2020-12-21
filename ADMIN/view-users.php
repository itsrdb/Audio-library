<?php
session_start();

$page_no = "";
$total_records_per_page = 10;   // change the number to show that many records in table
$page_link = "view-users.php";

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
        background-image: url('../Images/background1.jpg');
    }

    main {
        min-height: 100%;
        margin: 2%;
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
    <main>
        <div class="responsive-container">
            <?php
            echo '<center><table >
                <thead style="border-bottom:1px solid black"><td>Users</td>
                <td>Full Name</td>
                <td>Registered date</td>
                <td>Contact</td></thead>';

            $start_from = ($page_no - 1) * $total_records_per_page;
            $qry = "SELECT * FROM Clients ORDER BY sno ASC LIMIT $start_from, $total_records_per_page";
            $result = mysqli_query($link, $qry);

            while ($row = mysqli_fetch_array($result)) {
                $uname = $row['username'];
                $name = $row['Fname'] . " " . $row['Lname'];
                $dt = $row['dt'];
                $contact = $row['Email'];
                echo '<tr><td>' . $uname . '</td>
                <td>' . $name . '</td>
                <td>' . $dt . '</td>
                <td><a target="_blank" href="mailto:$contact">
                Message</a></td>
                </tr>';
            }
            echo '</table></center>';

            echo '<hr style="border: 1px solid black" >';
            ?>

            <div class="pagination">
                <?php
                $cntqry = mysqli_query($link, "SELECT COUNT(*) FROM Clients");
                include('pagination.php');
                ?>
            </div>
        </div>
    </main>

</body>

</html>