<!DOCTYPE html>
<html>
    <head>
        <title> Brittany's 777 Slot Machine </title>
        <style>
            @import url("css/styles.css");
        </style>
        <script>
            
        </script>
        
    </head>
    
    <body>
        <div id="main">
            
            <?php
            include 'inc/functions.php';
            $soundfile = "jackpot.ogg";
            play();
            ?>
            
            <form>
                <input type="submit" value="Spin!" />
            </form>
        </div>    
    </body>
</html>