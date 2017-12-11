<?php
    include 'database.php';
    $conn = getDatabaseConnection();
    
    $sql = "DELETE FROM movies WHERE movie_id=".$_GET['movie_id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM showtimes WHERE showtime_id=".$_GET['showtime_id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $sql = "DELETE FROM theatres WHERE theatre_id=".$_GET['theatre_id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
?>