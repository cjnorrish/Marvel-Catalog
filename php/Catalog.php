<!DOCTYPE html>
<html>
<body>

<?php
$xml=simplexml_load_file("../xml/catalog.xml") or die("Error Cannot create object");

    foreach($xml->children() as $xml){
        echo"<div class='movieContainer'>
            <img class='images' src=$xml->image>
        </div>";
    }
?>

</body>
</html>