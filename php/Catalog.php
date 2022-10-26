<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
</head>
<body>

<?php
    $x=0;
    $xml=simplexml_load_file("../xml/catalog.xml") or die("Error Cannot create object");
    echo"<div class='header'>
    <h1>MARVEL INFINITY SAGA</h1>
    </div>";

    echo"<div id='marvelMovies'>";
        foreach($xml->children() as $xml){
            $mName=$xml->title;
            $img =$xml->image;
            $imdbR=$xml->rating;
            $director=$xml->director;
            $MVlength =$xml->length; 
            echo"
                <center>
                    <a href='Details.php?t=$mName&rt=$imdbR&img=$img&dt=$director&l=$MVlength'>
                        <div class='movieContainer'>
                                <img class='images' src=$img>
                                    <h3>$mName</h3>            
                        </div>
                    </a>
                </center>";
        }
        echo"<div id='sort-container'>
                <form class='movie-form'>
                    <div class='grid-box'>
                        <div class='grid-child'>
                        <label for='SEARCH' class='search-label'>SEARCH</label><hr>
                        <input type='text' id='inputID-search' class='search-block' name='SEARCH' placeholder='Movie Name'>
                        </div> 

                        <div class='grid-child'>
                        <label for='ORDER'  class='search-label'>ORDER</label><hr>
                        <select id='ORDER' name='ORDER' class='search-block'>
                            <option name='order1' value='releaseDate'>Release Date</option>
                            <option name='order2' value='alphabetically'>Alphabetically</option>
                            <option name='order3' value='rating'>Rating</option>
                        </select> 
                        <span class='error-msg' id='error-order'>Please select an option</span>
                        </div>
                        
                        <div class='grid-child'>
                        <label for='ORDERBY'  class='search-label'>ORDER BY</label><hr>
                        <select id='ORDERBY' name='ORDERBY' class='search-block'>
                            <option name='orderBy1' value='asc'>Ascending</option>
                            <option name='orderBy2' value='desc'>Descending</option>
                            <option name='orderBy3' value='random'>Random</option>
                        </select> 
                        <span class='error-msg' id='error-orderBy'>Please select an option</span>
                        </div> 

                        <div class'grid-child'>
                            <input type='submit' id='sort-button' name='submit' value='SORT' class='search-block'>
                        </div> 
                    </div>               
                </form> 
            </div>";
  echo"</div>";

?>

</body>
</html>