<?php
session_start();

if (!isset($_SESSION['adminName'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}

function userList(){
  include 'database.php';
  $conn = getDBConnection();
 
  $sql = "SELECT *
          FROM Products";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
  //print_r($records);
  return $records;
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Main Page </title>
         <style>

        @import url("styles.css");            
        </style>
    </head>
    <body>

           
            //<h1> Welcome <?=$_SESSION['adminName']?>!</h1>
            <div class="main">
            //<form action="logout.php">
                
                //<input type="submit" value="logout" />
                
            //</form>
            <br />
            
            <?php
            
             $users = userList();
              echo "<table>";
                 echo "<tr>";
                 echo "<th>Product</th>";
                 echo "<th>Price</th>";
                 echo "</tr>";
             foreach($users as $user) {
                 echo "<tr>";
                 echo "<td>".$user['name'] . "</td>"."   <td>  $" . $user['price'] ."</td>"."<br>";
                 
                    }
                echo "</table>";
             ?>
           
           </div> 
    </body>
</html>