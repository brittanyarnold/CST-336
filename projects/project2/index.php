<?php include 'functions.php';
session_start(); 
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
            
            <form method="POST">
            
            Search by price
            <select name="sort">
                <option value="" >- Select One - </option>
                <option value="DESC">high to low</option>
                <option value="ASC">low to high</option>
            </select>
              
                   
            <br>   
            Search by company <select name="company">
                <option value="" >- Select One - </option>
                <?php getCompanyList() ?>
                
              </select>
                            
                <br>
            Search by category <select name="category">
                <option value="" >- Select One - </option>
                <?php getCategoryList() ?>
             
            </select>
            <br>
                
            <input type="submit" name= "submission" value="Submit">
            
            </form>
            
            <?php
           echo "<link rel='stylesheet' type='text/css' href='styles.css' />"; 
           
            
            if(isset($_POST['submission']))
            {
                $sort = $_POST['sort'];
                $company = $_POST['company'];
                $category =$_POST['category'];
                
            if(!empty($category)){
                
            $users = searchByCategory();
           
             echo "<table style='margin:0px auto;' border='0'>";
             echo "<tr>";
             echo "<th>Company</th>";
             echo "<th>Product</th>";
             echo "<th>Price</th>";
              echo "<th>More Info</th>";
             echo "</tr>";
         foreach($users as $user) {
             echo "<tr>";
             echo "<td>".$user['company_name']."</td>"."<td>".$user['name'] . "</td>"."   <td>  $" . $user['price'] ."</td>";
               echo "<td>"."[<a href='moreinfo.php?product_id=".$user['product_id']."'> Info </a>] "."</td>";
               echo "<td>"."[<a href='shoppingCart.php?product_id=".$user['product_id']."'> Add To Cart </a>] "."</td>";
              
               echo "</tr>";
                }
            echo "</table>";
                
            }    
            
             if (empty($sort) and !empty($company)){
            $users = searchByCompany();
           
            echo "<table  style='margin:0px auto;' border='0'>";
             echo "<tr>";
             echo "<th>Company</th>";
             echo "<th>Product</th>";
             echo "<th>Price</th>";
              echo "<th>More Info</th>";
             echo "</tr>";
         foreach($users as $user) {
             echo "<tr>";
             echo "<td>".$user['company_name']."</td>"."<td>".$user['name'] . "</td>"."   <td>  $" . $user['price'] ."</td>";
                echo "<td>"."[<a href='moreinfo.php?product_id=".$user['product_id']."'> Info </a>] "."</td>";
                echo "<td>"."[<a href='shoppingCart.php?product_id=".$user['product_id']."'> Add To Cart </a>] "."</td>";
                 echo "</tr>";
                }
            echo "</table>";
            //$_SESSION['shopping_cart']
            }
             if(!empty($sort) and empty($company))
            {
            $users = productList();
          
            echo "<table  style='margin:0px auto;' border='0'>";
             echo "<tr>";
             echo "<th>Company</th>";
             echo "<th>Product</th>";
             echo "<th>Price</th>";
              echo "<th>More Info</th>";
             echo "</tr>";
         foreach($users as $user) {
             echo "<tr>";
             echo "<td>".$user['company_name']."</td>"."<td>".$user['name'] . "</td>"."   <td>  $" . $user['price'] ."</td>";
               echo "<td>"."[<a href='moreinfo.php?product_id=".$user['product_id']."'> Info </a>] "."</td>";
               echo "<td>"."[<a href='shoppingCart.php?product_id=".$user['product_id']."'> Add To Cart </a>] "."</td>";
               echo "</tr>";
                }
            echo "</table>";
           
            }
             if (!empty($sort) and !empty($company)){
                 echo "Im inside";
            $users = combinationPriceCompany();
            echo "<table  style='margin:0px auto;' border='0'>";
             echo "<tr>";
             echo "<th>Company</th>";
             echo "<th>Product</th>";
             echo "<th>Price</th>";
              echo "<th>More Info</th>";
             echo "</tr>";
         foreach($users as $user) {
             echo "<tr>";
             echo "<td>".$user['company_name']."</td>"."<td>".$user['name'] . "</td>"."   <td>  $" . $user['price'] ."</td>";
              echo "<td>"."[<a href='moreinfo.php?product_id=".$user['product_id']."'>.... </a>] "."</td>";
               echo "<td>"."[<a href='shoppingCart.php?product_id=".$user['product_id']."'> Add To Cart </a>] "."</td>";
             echo "</tr>";
              
                }
            echo "</table>";
                
                    }
            }
            else {
                
            $users = userList();
            echo "<table  style='margin:0px auto;' border='0'>";
             echo "<tr>";
             echo "<th>Company</th>";
             echo "<th>Product</th>";
             echo "<th>Price</th>";
             echo "<th>More Info</th>";
             echo "</tr>";
         foreach($users as $user) {
             $url =$record['product_id'];
             echo "<tr>";
             echo "<td>".$user['company_name']."</td>"."<td>".$user['name'] . "</td>"."   <td>  $" . $user['price'] ."</td>";
              echo "<td>"."[<a href='moreinfo.php?product_id=".$user['product_id']."'> .... </a>] "."</td>";
               echo "<td>"."[<a href='shoppingCart.php?product_id=".$user['product_id']."'> Add To Cart </a>] "."</td>";
             echo "</tr>";
             
                }
            echo "</table>";
            }
             
        ?>
        </div>
    </body>
</html>