<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}


function movieList() {
    include 'database.php';
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM movies ORDER BY title";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Administrator Main Page</title>
        <style>
        @import url("styles.css");            
        </style>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this movie record?");
            }
        </script>
    </head>
    <body>
        <h1>Admin Main</h1>
        <h2>Welcome <?=$_SESSION['adminName']?>!</h2>
        <br />
        <form action="addRecord.php">
            <input type="submit" value="Add New Movie" />
        </form>
        <form action="logout.php">
            <input type="submit" value="Logout" />
        </form>
        <br />
        <?php
            $host = "us-cdbr-iron-east-05.cleardb.net";
            $username = "b45f2bb2cdf570";
            $password = "4c6a3bb8";
            $dbname="heroku_f586f5e6404419f";
                        $conn = new mysqli($host, $username, $password, $dbname);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $movies = movieList();
            
           
        
        $result = $conn->query($sql);
        ?>
        <?php
        foreach($movies as $movie) {
                echo $movie['movie_id']."   ".$movie['title']."  ".$movie['length']." mins ".$movie['rating'];
                echo "[<a href='updateRecord.php?movie_id=".$movie['movie_id']."'> Update </a>]";
                echo "[<a onclick='return confirmDelete()' href='delete.php?movie_id=".$movie['movie_id']."'> Delete </a>] <br />";
            }
            $conn->close();
        ?>
    </body>
</html>