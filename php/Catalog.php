<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
</head>
<body>

<?php
    $x=0;
    $searchMovie="";
    $xml=simplexml_load_file("../xml/catalog.xml") or die("Error Cannot create object");
    echo"<div class='header'>
    <h1>MARVEL INFINITY SAGA</h1>
    </div>";

    echo"<div id='marvelMovies'>";
        foreach($xml->children() as $xml){
            $x++;
            $mName=$xml->title;
            $img =$xml->image;
            $imdbR=$xml->rating;
            $director=$xml->director;
            $MVlength =$xml->length; 
            echo"
            <div class='movieholder'id=$x>
                <center class='center'>
                    <a href='Details.php?t=$mName&rt=$imdbR&img=$img&dt=$director&l=$MVlength'>
                        <div class='movieContainer'>
                                <img class='images' src=$img>
                                    <h3 id=$x>$mName</h3>            
                        </div>
                    </a>
                </center>
            </div>"    
            ;
        }
  echo"</div>";
?>
    <div id='sort-container'>
                <form class='movie-form' onsubmit="return false">
                    <div class='grid-box'>
                        <div class="grid-child">
                            <label for="SEARCH" class='search-label'>SEARCH</label><hr>
                            <input type="text" id="inputID-search" class="search-block" name="SEARCH" placeholder="Movie Name">
                            <input type='submit' id='search-button' name='submit' value='SEARCH' class='search-block'>
                        </div>

                        <div class='grid-child'>
                        <label for='ORDER'  class='search-label'>ORDER</label><hr>
                        <select id='ORDER' name='ORDER' class='search-block'>
                            <option name='order1' value='releaseDate'>Release Date</option>
                            <option name='order2' value='alphabetically'>Alphabetically</option>
                            <option name='order3' value='rating'>Rating</option>
                        </select> 
                        </div>
                        
                        <div class='grid-child'>
                        <label for='ORDERBY'  class='search-label'>ORDER BY</label><hr>   
                        <select id='ORDERBY' name='ORDERBY' class='search-block'>
                            <option name='orderBy1' value='asc'>Ascending</option>
                            <option name='orderBy2' value='desc'>Descending</option>
                            <option name='orderBy3' value='random'>Random</option>
                        </select> 
                        </div> 

                        <div class='grid-child'>
                            <input type='submit' onlick="SubmitButton()" id='sort-button' name='submit' value='SORT' class='search-block'>
                        </div> 
                    </div>               
                </form> 
            </div>
        
    <script type="text/javascript">
        var input =  document.getElementById("inputID-search").value;
        console.log(input);
        
        var moviesContainer = document.querySelectorAll("center");
        console.log(moviesContainer);
        var movies = document.querySelectorAll("div.movieContainer > h3");
        console.log(document.querySelectorAll(".movieContainer > h3")[1].innerText);


        const marvelDiv = document.getElementById("marvelMovies").innerHTML;
        console.log(marvelDiv);
        
        document.getElementById("search-button").addEventListener("click", function() {
            var searchedMovie = document.getElementById("inputID-search").value;
            console.log(searchedMovie);
            if(searchedMovie.length ==0){
                alert("No movie was searched. Please enter it the movie search bar. Thank you!");
            }
            for(var i =0; i<24; i++){
                var movieTitles=document.querySelectorAll(".movieContainer > h3")[i].innerHTML;
                console.log(movieTitles);
                if( searchedMovie.toLowerCase()==movieTitles.toLowerCase()){
                    
                    var movieDisplay = document.querySelectorAll(".movieholder")[i].innerHTML; 
                    console.log(movieDisplay + "movie :" + movieTitles.toLowerCase());
                    document.getElementById("marvelMovies").innerHTML = '';
                    document.getElementById("marvelMovies").innerHTML=movieDisplay;
                    
                }
            }
        });
    
        input.addEventListener('input', updateValue);

        function updateValue(e) {
        log.textContent = e.target.value;
        }

        function SubmitButton(event){
            var textInput = document.getElementById("inputID-search").value;
            var orderInput = document.getElementById("ORDER").value;
            var orderByInput = document.getElementById("ORDERBY").value;

            document.getElementById("header").innerHTML ="hello";
        }


    </script>        
</body>
</html>