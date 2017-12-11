<?php 
include 'functions.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Otter Movie Theatre  </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="styles.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1>OTTER MOVIE THEATRE</h1>
        <div id='main-content'>
            <form method="post">
                Sort By Length
                <select name="sort">
                <option value="" >- Select One - </option>
                    <option value="asc">Ascending</option>
                    <option value="dec">Descending</option>
                </select>
                <br>
                Search by Theatre
                <select name="theatre">
                    <option value="" >- Select One - </option>
                    <?=getAllTheatres() ?>
                </select>
                <br>
                Search by Movie
                <select name="movie">
                    <option value="" >- Select One - </option>
                    <?=getAllMovies() ?>
                </select>
                <br>
                <input type="submit" name="submit" value="Submit">
            </form>
            
            <?php
            if(isset($_POST['submit'])) {
                $sort = $_POST['sort'];
                $theatre = $_POST['theatre'];
                $movie =$_POST['movie'];
            }
            
            if(!empty($theatre)) {
                $results = searchByTheatre();
                echo "<table>";
                echo "<tr>";
                echo "<th>  Theatre Name </th>";
                echo "<th>  Phone Number </th>";
                echo "<th>  Adress</th>";
                echo "<th>  City </th>";
                echo "<th>  State </th>";
                echo "<th>  Zicode </th>";
                echo "<th>  Movie Title </th>";
                echo "<th>  Runtime </th>";
                echo "<th>  Rating </th>";
                echo "<th>  Start Time</th>";
                echo "<th>  Auditorium </th>";
                echo "</tr>";
                foreach($results as $result) {
                    echo "<tr>";
                    echo "<td>".$result['name']."</td>"."<td>".$result['phone_number']."</td>"."<td>".$result['street_address']."</td>"."<td>".$result['city']."</td>"."<td>".$result['state']."</td>"."<td>".$result['zip_code']."</td>"."<td>".$result['title']."</td>"."<td>".$result['length']."</td>"."<td>".$result['rating']."</td>"."<td>".$result['start_time']."</td>"."<td>".$result['auditorium']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            
            if(empty($sort) and !empty($movie)) {
                $results = searchByMovie();
                echo "<table>";
                echo "<tr>";
                echo "<th>  Theatre Name </th>";
                echo "<th>  Phone Number </th>";
                echo "<th>  Adress</th>";
                echo "<th>  City </th>";
                echo "<th>  State </th>";
                echo "<th>  Zicode </th>";
                echo "<th>  Movie Title </th>";
                echo "<th>  Runtime </th>";
                echo "<th>  Rating </th>";
                echo "<th>  Start Time</th>";
                echo "<th>  Auditorium </th>";
                echo "</tr>";
                foreach($results as $result) {
                    echo "<tr>";
                    echo "<td>".$result['name']."</td>"."<td>".$result['phone_number']."</td>"."<td>".$result['street_address']."</td>"."<td>".$result['city']."</td>"."<td>".$result['state']."</td>"."<td>".$result['zip_code']."</td>"."<td>".$result['title']."</td>"."<td>".$result['length']."</td>"."<td>".$result['rating']."</td>"."<td>".$result['start_time']."</td>"."<td>".$result['auditorium']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            
            ?>
        </div>
        <form action="login.php">
            <input type="submit" value="Sign In As Admin" />
        </form>
    </body>
</html>
