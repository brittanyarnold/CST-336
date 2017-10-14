<?php
    $total = 0;
    $price = 0;
    $size = $_POST['size'];
    $extra = $_POST["extra"];
    $quantity = $_POST["quantity"];
    $extra = $_POST["extra"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pizza Order Confirmation</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="receipt">
            <h1>YOUR ORDER HAS BEEN RECEIVED</h1><br><br><br><br><br><br><br><br><br>
            
            <br>Your Name: <?php echo $_POST["name"]; ?><br>
            Your Email Address: <?php echo $_POST["email"]; ?><br>
            Delivery Address: <?php echo $_POST["address"]; ?><br>
            <?php
                if (isset($_POST['submit'])) {
                    if(isset($_POST['crust'])) {
                    echo "Crust Choice :".$_POST['crust']."<br>"; 
                    }
                    if(isset($_POST['size'])) {
                    echo "Size :".$_POST['size']."<br>"; 
                    }
                    if(isset($_POST['pickupmethod'])) {
                    echo "Pickup Method :".$_POST['pickupmethod']."<br>"; 
                    }
                }
                
                if($size == 'Small') {
                    $total += 10;
                } else if ($size == 'Medium') {
                    $total += 12;
                } else if($size =='Large') {
                    $total += 15;
                }
            ?>
            Quantity: <?php echo $_POST["quantity"]; ?><br>
            Extras: <?php echo $_POST["extra"]; ?><br>
            <?php
                if($extra == 'Coca-Cola (2-liter) (3.00)') {
                    $extra = 3;
                } else if ($extra == 'Hot Wings (12) (8.00)') {
                    $extra = 8;
                } else if ($extra == 'Hot Wings (6) (5.00)') {
                    $extra = 5;
                } else if ($extra == 'Bread Sticks (12) (5.00)') {
                    $extra = 5;
                } else if ($extra == 'Bread Sticks (6) (3.00)') {
                    $extra = 3;
                }
            ?>
            Special Requests: <?php echo $_POST["comment"]; ?><br>
            
            Total: $ <?php echo ($total*$quantity + $extra);?>
            <h4>Your order will be ready in 40 minutes.</h4>
            <br><br>
        </div>
    </body>
</html>