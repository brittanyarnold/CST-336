<?php
    include 'database.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT SUM(length) FROM movies";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $s = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $sum = $s[0]['SUM(length)'];
    
    print $sum;
?>