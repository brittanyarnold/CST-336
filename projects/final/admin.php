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
            $movies = movieList();
            foreach($movies as $movie) {
                echo $movie['movie_id']."   ".$movie['title']."  ".$movie['length']." mins ".$movie['rating'];
                echo "[<a href='updateRecord.php?movie_id=".$movie['movie_id']."'> Update </a>]";
                echo "[<a onclick='return confirmDelete()' href='delete.php?movie_id=".$movie['movie_id']."'> Delete </a>] <br />";
            }
        ?>
    </body>
</html>