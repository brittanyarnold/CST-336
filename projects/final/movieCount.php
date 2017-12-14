<?php
    include 'database.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT COUNT(*) FROM movies";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $a = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $count = $a[0]['COUNT(*)'];
    
    print $count;
?>