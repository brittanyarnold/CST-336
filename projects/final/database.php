<?php
function getDatabaseConnection(){
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b45f2bb2cdf570";
    $password = "4c6a3bb8";
    $dbname="heroku_f586f5e6404419f";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    return $conn;
}