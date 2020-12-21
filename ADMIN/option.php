<?php
$qry = "SELECT * FROM Artist";
$result = mysqli_query($link, $qry);
echo "<datalist id='all-artist'>";
while ($row = mysqli_fetch_array($result)) {
    $opt = htmlentities($row['artist_name']);
    echo "<option value='$opt' > ";
}
echo "</datalist>";

$qry = "SELECT * FROM Album";
$result = mysqli_query($link, $qry);
echo "<datalist id='all-album'>";
while ($row = mysqli_fetch_array($result)) {
    $opt = htmlentities($row['album_title']);
    echo "<option value='$opt' > ";
}
echo "</datalist>";

$qry = "SELECT * FROM Genre";
$result = mysqli_query($link, $qry);
echo "<datalist id='all-genre'>";
while ($row = mysqli_fetch_array($result)) {
    $opt = htmlentities($row['genre_type']);
    echo "<option value= '$opt' > ";
}
echo "</datalist>";
?>