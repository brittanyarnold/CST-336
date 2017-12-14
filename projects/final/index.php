<?php
    include 'functions.php';
    session_start();
    function loginProcess() {
    if (isset($_GET['loginPage'])) {  //checks if form has been submitted
        header("Location: login.php"); //redirecting to login.php
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Otter Ticket Search </title>
        <style>
            @import url("styles.css");            
        </style>
    </head>
    
    <body>
        <h1> Welcome to Otter Movie Ticket Search </h1>
        <div class="main">
            <form method="POST">
                Search by Length
                <select name="sort">
                    <option value="">- Select One - </option>
                    <option value="DESC">Longest to Shortest</option>
                    <option value="ASC">Shortest to Longest</option></option>
                </select>
                  
                <br>   
                Search by Theatre 
                <select name="theatre">
                    <option value="">- Select One - </option>
                    <?=getAllTheatres()?>
                </select>
                <br>
                Search by Movie
                <select name="movie">
                    <option value="">- Select One - </option>
                    <?=getAllMovies()?>
                </select>
                <br>
                <input type="submit" name= "submission" value="Submit">
            </form>
            
            <?php
            echo "<link rel='stylesheet' type='text/css' href='styles.css' />"; 
            if(isset($_POST['submission'])) {
                $sort = $_POST['sort'];
                $theatre = $_POST['theatre'];
                $movie = $_POST['movie'];
                if(!empty($movie)) { //user chose to search by movie
                    $users = searchByMovie();
                    echo "<table style='margin:0px auto;' border='0'>";
                    echo "<tr>";
                    echo "<th>Title</th>";
                    echo "<th>Length</th>";
                    echo "<th>Rating</th>";
                    echo "<th>Theatre</th>";
                    echo "<th>Address</th>";
                    echo "<th>City</th>";
                    echo "<th>Zip</th>";
                    echo "<th>Start</th>";
                    echo "<th>Auditorium</th>";
                    echo "</tr>";
                    foreach($users as $user) {
                        echo "<tr>";
                        echo "<td>".$user['title']."</td><td>".$user['length']."</td><td>".$user['rating']."</td><td>".$user['name']."</td><td>".$user['street_address']."</td><td>".$user['city']."</td><td>".$user['zip_code']."</td><td>".$user['start_time']."</td><td>".$user['auditorium'];
                        echo "</tr>";
                    }
                    echo "</table>";
                }    
                else if (empty($sort) and !empty($theatre)) { //user chose to search by theatre
                    $users = searchByTheatre();
                    echo "<table style='margin:0px auto;' border='0'>";
                    echo "<tr>";
                    echo "<th>Title</th>";
                    echo "<th>Length</th>";
                    echo "<th>Rating</th>";
                    echo "<th>Theatre</th>";
                    echo "<th>Address</th>";
                    echo "<th>City</th>";
                    echo "<th>Zip</th>";
                    echo "<th>Start</th>";
                    echo "<th>Auditorium</th>";
                    echo "</tr>";
                    foreach($users as $user) {
                        echo "<tr>";
                        echo "<td>".$user['title']."</td><td>".$user['length']."</td><td>".$user['rating']."</td><td>".$user['name']."</td><td>".$user['street_address']."</td><td>".$user['city']."</td><td>".$user['zip_code']."</td><td>".$user['start_time']."</td><td>".$user['auditorium'];
                        echo "</tr>";
                    }
                    echo "</table>";
                }    
                else if(!empty($sort) and empty($theatre)) { //user wants search of movies
                    $users = movieTimeList();
                    echo "<table style='margin:0px auto;' border='0'>";
                    echo "<tr>";
                    echo "<th>Title</th>";
                    echo "<th>Length</th>";
                    echo "<th>Rating</th>";
                    echo "<th>Theatre</th>";
                    echo "<th>Address</th>";
                    echo "<th>City</th>";
                    echo "<th>Zip</th>";
                    echo "<th>Start</th>";
                    echo "<th>Auditorium</th>";
                    echo "</tr>";
                    foreach($users as $user) {
                        echo "<tr>";
                        echo "<td>".$user['title']."</td><td>".$user['length']."</td><td>".$user['rating']."</td><td>".$user['name']."</td><td>".$user['street_address']."</td><td>".$user['city']."</td><td>".$user['zip_code']."</td><td>".$user['start_time']."</td><td>".$user['auditorium'];
                        echo "</tr>";
                    }
                    echo "</table>";
                }    
                else if (!empty($sort) and !empty($theatre)) { //search by length and theatre
                    $users = searchByTheatre();
                    echo "<table style='margin:0px auto;' border='0'>";
                    echo "<tr>";
                    echo "<th>Title</th>";
                    echo "<th>Length</th>";
                    echo "<th>Rating</th>";
                    echo "<th>Theatre</th>";
                    echo "<th>Address</th>";
                    echo "<th>City</th>";
                    echo "<th>Zip</th>";
                    echo "<th>Start</th>";
                    echo "<th>Auditorium</th>";
                    echo "</tr>";
                    foreach($users as $user) {
                        echo "<tr>";
                        echo "<td>".$user['title']."</td><td>".$user['length']."</td><td>".$user['rating']."</td><td>".$user['name']."</td><td>".$user['street_address']."</td><td>".$user['city']."</td><td>".$user['zip_code']."</td><td>".$user['start_time']."</td><td>".$user['auditorium'];
                        echo "</tr>";
                    }
                    echo "</table>";
                } else { //display all data
                    $users = userList();
                    echo "<table style='margin:0px auto;' border='0'>";
                    echo "<tr>";
                    echo "<th>Title</th>";
                    echo "<th>Length</th>";
                    echo "<th>Rating</th>";
                    echo "<th>Theatre</th>";
                    echo "<th>Address</th>";
                    echo "<th>City</th>";
                    echo "<th>Zip</th>";
                    echo "<th>Start</th>";
                    echo "<th>Auditorium</th>";
                    echo "</tr>";
                    foreach($users as $user) {
                        echo "<tr>";
                        echo "<td>".$user['title']."</td><td>".$user['length']."</td><td>".$user['rating']."</td><td>".$user['name']."</td><td>".$user['street_address']."</td><td>".$user['city']."</td><td>".$user['zip_code']."</td><td>".$user['start_time']."</td><td>".$user['auditorium'];
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
        ?>
        <form action="login.php">
            <input type="submit" name="loginPage" value="Admin Login"/>
        </form>
        </div>
    </body>
</html>
