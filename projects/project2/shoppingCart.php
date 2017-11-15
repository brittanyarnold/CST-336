<?php 
    include'functions.php';
    session_start();
    if(array_key_exists('shopping_cart',$_SESSION) && !empty($_SESSION['shopping_cart'])) {
        if (isset($_GET['product_id']) && !in_array($_GET['product_id'],$_SESSION["shopping_cart"])) {
            echo 'Added' . $_GET['product_id'] . ' to shopping cart!';
            array_push($_SESSION["shopping_cart"], $_GET['product_id']);
        }
    }
    else{
        if (isset($_GET['product_id'])) {
            echo 'Added' . $_GET['product_id'] . ' to NEW shopping cart!';
            
            $_SESSION['shopping_cart'] = array($_GET['product_id']);
      
        }
    }
    
    if(isset($_POST['submission'])){
        session_destroy();
    }
    
    function displayShoppingCart(){
        $products = productList();
        echo "<table  style='margin:0px auto;' border='0'>";
            echo "<tr>";
                echo "<th>Company</th>";
                echo "<th>Product</th>";
                echo "<th>Price</th>";
                echo "<th>More Info</th>";
            echo "</tr>";
        foreach($products as $product){
            if(in_array($product['product_id'],$_SESSION["shopping_cart"])){
                echo "<tr>";
                    echo "<td>".$product['company_name']."</td>".
                    "<td>".     $product['name'] . "</td>".
                    "<td>  $" . $product['price'] ."</td>";
                    echo "<td>"."[<a href='moreinfo.php?product_id=".$product['product_id']."'> Info </a>] "."</td>";
                echo "</tr>";
                
                }
            }
            echo "</table>";
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
            <h2> Your Shopping Cart </h2>
            
            <form method="POST">
                 <input type="submit" name= "submission" value="Submit">
            </form>
            <?php
                $arr = $_SESSION['shopping_cart'];
            
                foreach ($arr as $key => $value) {
                    //echo $value . "<br />";
                }
              displayShoppingCart();
              
              
              
            ?>
            
        </div>
    </body>
</html>