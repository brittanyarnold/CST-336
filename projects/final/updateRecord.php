<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}

function getMovieInfo() {
    //global $conn;
    include 'database.php';
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM movies WHERE movie_id=".$_GET['movie_id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $record;
}



if(isset($_GET['updateMovie'])) {
    $sql = "UPDATE movies
            SET title = :title,
                length = :length,
                rating = :rating,
            WHERE movie_id = :movie_id";
    $np = array();
    $np[':movie_id'] = $_GET['movie_id'];
    $np[':title'] = $_GET['title'];
    $np[':length'] = $_GET['length'];
    $np[':rating'] = $_GET['rating'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    echo "Record has been updated!";
}

if(isset($_GET['movie_id'])) {
  $movieInfo = getMovieInfo();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Movie</title>
        <style>
            @import url("styles.css");            
        </style>
    </head>
    <body>
        <h1>Update Movie</h1>
        <form method="GET">
            <input type="hidden" name="movie_id" value="<?=$movieInfo['movie_id']?>" />
            Title:<input type="text" name="title" value="<?=$movieInfo['title']?>" />
            <br />
            Length:<input type="text" name="length" value="<?=$movieInfo['length']?>" />
            <br/>
            Rating: <input type= "text" name ="rating" value="<?=$movieInfo['rating']?>" />
            <br/>
            <input type="submit" value="Update Movie" name="updateMovie">
        </form>
       
    </body>
</html>