<?php
    include "./api/pixabayAPI.php";
    $backgroundImage = "./img/sea.jpg";
    function getSevenRandomImages($imgURLs) {
        $imagesToDisplay = array_slice($imgURLs, 0, 7);
        return $imagesToDisplay;
    }
    
    
    if(isset($_GET['layout'])) {
        if(!$_GET['category']=="") {
            $imgURLs = getImageURLs($_GET['category'], $_GET['layout']);
            $imagesToDisplay = getSevenRandomImages($imgURLs);
            $backgroundImage = $imagesToDisplay[array_rand($imagesToDisplay)];
        } else {
            if(isset($_GET['keyword'])){
                $imgURLs = getImageURLs($_GET['keyword'],$_GET['layout']);
                $imagesToDisplay = getSevenRandomImages($imgURLs);
                $backgroundImage = $imagesToDisplay[array_rand($imagesToDisplay)];
            }
    }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("./css/styles.css");
        </style>
        <style>
            body {
                background-image: url("<?=$backgroundImage?>");
                background-size: 100% 100%;
                background-attachment: fixed;
                font-family: 'Merienda One', cursive;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <?php
            if(!isset($imagesToDisplay)) {
                echo '<h2 style="font-size:3.5em"> Enter query to see images from Pixabay </h2>';
            } else {
        
            echo '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width:300px">';
            
            echo '<ol class="carousel-indicators">';
            for($i = 0; $i < count($imagesToDisplay); $i++) {
                echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"';
                echo $i == 0 ? 'class="active"' : '';
                echo '></li>';
            }
            echo '</ol>';
            
            echo '<div class="carousel-inner" role="listbox">';
                for($i = 0; $i < count($imagesToDisplay); $i++) {
                    echo '<div class="item ';
                    echo $i == 0 ? 'active' : '';
                    echo '">';
                    echo '<img src="'.$imagesToDisplay[$i].'" alt="...">';
                    echo '</div>';
                }
            echo '</div>';  
        ?>
        
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        
        </div>
        
        <?php        
            } //bracket finishes else
        ?>
        <br>
        <form>
            <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/><br>
        
            <div id="radioDiv">
                <input type="radio" name="layout" id="lhorizontal" value="horizontal">
                <label for="Horizontal"></label><label for="lhorizontal" style="font-size:1.5em">Horizontal </label><br/>
                <input type="radio" name="layout" value="vertical" id="lvertical"/>
                <label for="Vertical"></label><label for="lvertical" style="font-size:1.5em"> Vertical </label><br/>
            </div>
            <select name="category" style="color:black; font-size:1.5em">
                 <option value=""> - Select One - </option>
                 <option value="surfing"  > Surfing </option>
                 <option> Food </option>
                 <option> Video Games </option>
                 <option> Music </option>
                 <option> Sports </option>
            </select><br /><br />
            <input type="submit" value="Submit" style="background-color:#ffcce0; color:black; font-size:1.5em" />
        </form>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
