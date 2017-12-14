<?php
include 'database.php';
$conn = getDatabaseConnection();
if (isset($_GET['addRecord'])) {  //the add form has been submitted
    $sql = "INSERT INTO movies
             (title, length, rating) 
             VALUES
             (:title, :length, :rating)";
    $np = array();
    $np[':title'] = $_GET['title'];
    $np[':length'] = $_GET['length'];
    $np[':rating'] = $_GET['rating'];
    $stmt=$conn->prepare($sql);
    $stmt->execute($np);
    echo "Movie was added!";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admininstration: Add New Movie</title>
        <style>
            @import url("styles.css");
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
            <h1>Admin: Add New Movie</h1>
            <br>
            <div id="box">
            <form method="get">
            <input type="hidden" name="movie_id" value="<?=$_GET['movie_id']?>" />
            Title:<input type="text" name="title" value="<?=$_GET['title']?>" />
            <br />
            Length:<input type="text" name="length" value="<?=$_GET['length']?>" />
            <br/>
            Rating: <input type= "text" name ="rating" value="<?=$_GET['rating']?>" />
            <br/>
            <input type="submit" value="Add Movie" name="addRecord">
        </form>
            </form>
            <br>
            <form action="admin.php">
                
                <input type="submit" value="Home" />
                
            </form>
            <br>
            <br>
        </div>
    </body>
</html>