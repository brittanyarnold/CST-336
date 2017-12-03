<?php
echo "In api logic <br>";
function getDatabaseConnection()
{
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b45f2bb2cdf570";
    $password  = "4c6a3bb8";
    $dbname = "heroku_f586f5e6404419f";
    // Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function getUsersThatMatchUsername() {
    $username = $_GET['username'];
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll();
    echo json_encode($records);
}

function validatePassword() {
    $username = $_GET['username'];
    $password = $_GET['password'];
    echo sha1($password);
}

if($_GET['action'] == 'validate-username') {
    getUsersThatMatchUsername();
} else if($_GET['action'] == 'validate-password') {
    validatePassword();
}

?>
