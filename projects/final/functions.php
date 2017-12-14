<?php
include 'database.php';
$conn = getDatabaseConnection();

function searchByMovie() {
    global $conn;
    $movie = $_POST['movie'];
    $sql="SELECT * FROM showtimes NATURAL JOIN theatres NATURAL JOIN movies where movie_id=$movie";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

function getAllMovies() {
    global $conn;
    $sql = "SELECT * FROM movies";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
        echo "<option value='".$row['movie_id']."'>".$row['title']."</option>";
    }
}

function movieTimeList() {
    global $conn;
    $sort = $_POST['sort'];
    $sql = "SELECT * FROM showtimes NATURAL JOIN movies ORDER BY length $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

function searchByTheatre() {
    global $conn;
    $theatre = $_POST['theatre'];
    $sort = $_POST['sort'];
    $sql = "SELECT * FROM showtimes NATURAL JOIN theatre where theatre_id=$theatre ORDER BY name $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

function userList(){
    global $conn;
    $sql = "SELECT * FROM showtimes NATURAL JOIN movies NATURAL JOIN theatres";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
     return $records;
}


function getAllTheatres() {
    global $conn;
    $sql = "SELECT * FROM theatres";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
        echo "<option value='".$row['id']."'>".$row['name']."</option>";
    }
}

function combinationLengthMovie() {
    global $conn;
    $movie = $_POST['movie'];
    $sort = $_POST['sort'];
    $sql = "SELECT * FROM movies NATURAL JOIN showtimes where movie_id = $movie order by show_time $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}
?>