<?php
include 'database.php';
$conn = getDatabaseConnection();

$sql = "DELETE FROM user WHERE id=".$_GET['userId'];

$stmt = $conn->prepare($sql);
$stmt->execute();
header("Location: admin.php");
?>