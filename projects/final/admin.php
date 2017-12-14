<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
}


function movieList() {
    include 'database.php';
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM showtimes NATURAL JOIN theatres NATURAL JOIN movies ORDER BY title";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="styles.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this movie record?");
            }
            function avgLength(){
                $.ajax({
                    type: "get",
                    url: "averageLength.php?",
                    data: {"avgLength":$("#avgLen").val()},
                    success: function(data,status) {
                        $("#avgLen").html(data);
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                         //alert(status);
                    }
                });
            }
            function sumLength(){
                $.ajax({
                    type: "get",
                    url: "sumLength.php?",
                    data: {"sumLength":$("#sumLength").val()},
                    success: function(data,status) {
                        $("#sumLength").html(data);
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                         //alert(status);
                    }
                });
            }
            function countMovies(){
                $.ajax({
                    type: "get",
                    url: "movieCount.php?",
                    data: {"movieCount":$("#mvCount").val()},
                    success: function(data,status) {
                        $("#mvCount").html(data);
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                         //alert(status);
                    }
                });
            }
        </script>
    </head>
    <title>Administrator Main Page</title>
    <body>
        <h1>Admin Main</h1>
        <br />
        <div id="controls">
            <h2>Welcome <?=$_SESSION['adminName']?>!</h2>
            <form action="addRecord.php">
                <input type="submit" value="Add New Movie" />
            </form>
            <form action="logout.php">
                <input type="submit" value="Logout" />
            </form>
            <br />
            <button onclick="avgLength();">Average Length</button><span id="avgLen"></span>
            <button onclick="sumLength();">Sum Length</button><span id="sumLength"></span>
            <button onclick="countMovies();">Movie Count</button><span id="mvCount"></span><br/>
        </div>
        <table style="width:100%" class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Length</th>";
                <th>Rating</th>";
                <th>Theatre</th>";
                <th>Address</th>";
                <th>City</th>";
                <th>Zip</th>";
                <th>Start</th>";
                <th>Auditorium</th>";
        </tr>   
        

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
         ?>   
          
           
        
        
      
        <?php
        foreach($movies as $movie) {
                echo "<tr><td>".$movie['movie_id']."</td><td>".$movie['title']."</td><td>".$movie['length']." mins</td><td>".$movie['rating']."</td><td>".$movie['name']."</td><td>".$movie['street_address']."</td><td>".$movie['city']."</td><td>".$movie['zip_code']."</td><td>".$movie['start_time']."</td><td>".$movie['auditorium'];
                echo "[<a href='updateRecord.php?movie_id=".$movie['movie_id']."'> Update </a>]";
                echo "[<a onclick='return confirmDelete()' href='delete.php?movie_id=".$movie['movie_id']."'> Delete </a>] <br />";
            }
        $conn->close();
        ?>
    </body>
</html>