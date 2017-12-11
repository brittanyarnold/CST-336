<?php
include 'database.php';
$conn = getDatabaseConnection();

function getAllMovies() {
    global $conn;
    $sql = "SELECT * FROM movies ORDER BY title ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
        echo "<option value='". $row['id']. "'>". $row['title']." ".$row['title']." ".$row['length']." mins ".$row['rating']."</option>";
    }
}

function getAllTheatres() {
    global $conn;
    $sql = "SELECT * FROM theatres ORDER BY name ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
        echo "<option value='". $row['id']. "'>". $row['name']."</option>";
    }
}

function getAllRatings() {
    global $conn;
    $sql = "SELECT DISTINCT rating FROM movies ORDER BY rating ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
        echo "<option value='". $row['id']. "'>". $row['rating']."</option>";
    }
}

function searchByTheatre() {
    global $conn;
    $theatre = $_POST['theatre'];
    $sql = "SELECT name, phone_number, street_address, city, state, zip_code, title, length, rating, start_time, auditorium FROM movies INNER JOIN showtimes ON showtimes.movie_id = movies.movie_id INNER JOIN theatres ON theatres.theatre_id = showtimes.theatre_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

function searchByMovie() {
    global $conn;
    $movie = $_POST['movie'];
    $sql = "SELECT title, length, rating, name, start_time, auditorium FROM movies NATURAL JOIN showtimes NATURAL JOIN theatres WHERE movie_id=$movie";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}
?>