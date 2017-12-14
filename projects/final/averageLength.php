<?php
    include 'database.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT AVG(length) FROM movies";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $avg = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $avg1 = $avg[0]['AVG(length)'];
    print $avg1 ;
?>