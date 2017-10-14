<?php
    $name=$email=$address=$crust=$sauce=$size=$extra=$comment=$quantity="";
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Pizza Order</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        <div id="main-content">
            <h1>CHEEZER'S PIZZA</h1>
            <form action="receipt.php" method="post">
                <input type="text" name="name" placeholder="Name" value="<?=$_GET['name']?>"/><br><br>
                <input type="text" name="email" placeholder="Email" value="<?=$_GET['email']?>"/><br><br>
                <input type="text" name="address" placeholder="Address" value="<?=$_GET['address']?>"/><br><br>
                Crust Style:<br>
                    <input type="radio" name="crust" value="Thin"/>Thin
                    <input type="radio" name="crust"  value="Regular"/>Regular
                    <input type="radio" name="crust"  value="Thick"/>Thick
                <br><br>    
                Size Choice:<br>
                    <input type="radio" name="size" value="Small"/>Small - $10
                    <input type="radio" name="size" value="Medium"/>Medium - $12
                    <input type="radio" name="size" value="Large"/>Large - $15
                <br><br>
                <input type="text" name="quantity" placeholder="Quantity" value="<?=$_GET["quantity"]?>"/><br><br>
                <h3>Extras <h3>
                <select name="extra" size="4" value="<?=$_GET["extra"]?>" multiple>
                    <option selected>None</option>
                    <option>Coca-Cola (2-liter) (3.00)</option>
                    <option>Hot Wings (12) (8.00)</option>
                    <option>Hot Wings (6) (5.00)</option>
                    <option>Bread Sticks (12) (5.00)</option>
                    <option>Bread Sticks (6) (3.00)</option>
                </select>
                
                <select name="Types[]" multiple>
                    <option value="Veggie">VEGGIE</option>
                    <option value="Hawaiian">HAWAIIAN</option>
                    <option value="All Meat">ALL MEAT</option>
                    <option value="Combination">COMBINATION</option>
                </select>
                <br><br>
                
                Special Requests:<br>
                    <textarea name="comment" rows="5" cols="40"></textarea><br>
                Pickup Method:<br>
                    <input type="radio" name="pickupmethod" value="Pickup">Pick Up
                    <input type="radio" name="pickupmethod" value="Delivery">Delivery (Free of Charge)
                <br><br>   
                <input type="reset" name="reset" value="RESET ORDER FORM">
                <input type="submit" name="submit" value="MAKE MY PIZZA"> 
                
                
            </form>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>