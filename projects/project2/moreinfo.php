<?php 
    include'functions.php';
    
     if (isset($_GET['product_id'])) {
     
    $userInfo = moreInfo(); 
     }
     
  
  function moreInfo() {
    global $conn;
    $sql = "SELECT * 
            FROM Products NATURAL JOIN Company NATURAL JOIN Department
            WHERE product_id = " . $_GET['product_id']; 
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($record);
    
    return $record;

}
    
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Otter Shopping Mall  </title>
        
        <style>
        
        @import url("styles.css");            
        </style>
    </head>
    <body>
            <h1> Welcome to Otter Shopping Mall </h1>
            <div class ="main">
            <h2> More Information </h2>
            <form method ="POST">
            <input type="hidden" name="product_id" value="<?=$userInfo['product_id']?>" />   
            <?php
    
               echo "<table  style='margin:0px auto;' border='0'>";
             
                 echo "<tr>";
                 echo "<th>Company</th>";
                 echo "<th>Product</th>";
                 echo "<th>Price</th>";
                  echo "<th>Store Location</th>";
                   echo "<th>Category</th>";
                 echo "</tr>";
           
                 echo "<tr>";
                 echo "<td>".$userInfo['company_name']."</td>"."<td>".$userInfo['name'] . "</td>"."   <td>  $" . $userInfo['price'] ."</td>"."<td>".$userInfo['location']."</td>"."<td>".$userInfo['department_name']."</td>";
                 
                echo "</tr>";
               
                echo "</table>";
                
            ?>
        </div>
    </body>
</html>