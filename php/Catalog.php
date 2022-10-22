<!DOCTYPE html>
<html>
<body>

<head>
        <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
</head>

<?php
    $xml=simplexml_load_file("../xml/catalog.xml") or die("Error Cannot create object");
    echo"<div class='header'>
    <h1>MARVEL INFINITY SAGA</h1>
    </div>";


    echo"<div id='marvelMovies'>";
    foreach($xml->children() as $xml){
          echo"
          <center>
            <div class='movieContainer'>
                        <img class='images' src=$xml->image>
                        <h3>$xml->title</h3>
            </div>
          </center>";
    }
    echo"<div id='sort-container'></div>";
  echo"</div>";

?>

</body>
</html>