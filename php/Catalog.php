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
                        </select> 
                        </div>
                        
                        <div class='grid-child'>
                        <label for='ORDERBY'  class='search-label'>ORDER BY</label><hr>   
                        <select id='ORDERBY' name='ORDERBY' class='search-block'>
                            <option name='orderBy1' value='asc'>Ascending</option>
                            <option name='orderBy2' value='desc'>Descending</option>
                        </select> 
                        </div> 

                        <div class='grid-child'>
                            <input type='submit' id='sort-button' name='submit' value='SORT' class='search-block'>
                        </div> 
                    </div>               
                </form> 
            </div>
        
    <script type="text/javascript">
        var input =  document.getElementById("inputID-search");
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
            console.log(e.target.value);
            var searchVal = e.target.value;
            if(searchVal.length<4){
                document.getElementById("marvelMovies").innerHTML=marvelDiv;
            }
        }

    </script>  
    

    <script type="text/javascript">

        document.getElementById("sort-button").addEventListener("click", function() {
            var order_Byinput = document.getElementById("ORDERBY").value;
            var order_input = document.getElementById("ORDER").value;
            var movietitles=[]; 
            const originalTitles=[];
            var imgURL=[];
            var Atag=[];
            for(var i = 0; i < 23; i++){
                originalTitles[i] = document.querySelectorAll("h3")[i].innerText;
            }

            if (order_Byinput== "desc" && order_input == "releaseDate") {
                for(var i = 0; i < 23; i++){
                        
                    movietitles[i] = document.querySelectorAll("h3")[i].innerText;
                    Atag[i]= document.querySelectorAll("a")[i].getAttribute("href");
                    imgURL[i]= document.querySelectorAll("img")[i].getAttribute("src");
                        
                }
                    
                var imageDescUrl;
                var descTitle;
                var descTag;
                var indexDesc=0;
                for(var j = 22; j > -1; j--){
                    imageDescUrl=document.querySelectorAll("img")[j];
                    descTitle = document.querySelectorAll(".movieContainer > h3")[j];
                    descTag = document.querySelectorAll("a")[j];
                    imageDescUrl.src = imgURL[indexDesc];
                    console.log(movietitles[indexDesc]);
                    descTitle.innerText =  movietitles[indexDesc];
                    descTag.href =Atag[indexDesc];
                    console.log(imageDescUrl);
                    indexDesc++;
                }
        

            }
            else if(order_Byinput== "asc" && order_input == "releaseDate") {
                document.getElementById("marvelMovies").innerHTML = '';
                document.getElementById("marvelMovies").innerHTML = marvelDiv;
            }

            for(var i = 0; i < 23; i++){
                movietitles[i] = document.querySelectorAll("h3")[i].innerText;
                    
            }


            if(order_input == "alphabetically" && order_Byinput== "desc") {

                var descMovieTitles = movietitles.sort().reverse();

                for(var x=0; x<23; x++){
                    var descIndex = originalTitles.indexOf(descMovieTitles[x]);
                    console.log("This is the index num of "+descMovieTitles[x]+" : "+descIndex);
                    movietitles[x] = document.querySelectorAll("h3")[descIndex].innerText;
                    Atag[x]= document.querySelectorAll("a")[descIndex].getAttribute("href");
                    imgURL[x]= document.querySelectorAll("img")[descIndex].getAttribute("src");
                }

                for(var n=0; n<23; n++){
                    imageDescUrl=document.querySelectorAll("img")[n];
                    descTitle = document.querySelectorAll(".movieContainer > h3")[n];
                    descTag = document.querySelectorAll("a")[n];
                    imageDescUrl.src = imgURL[n];
                    console.log(movietitles[n]);
                    descTitle.innerText =  movietitles[n];
                    descTag.href =Atag[n];
                    console.log(imageDescUrl);
                }
            }
            else if(order_Byinput== "asc" && order_input== "alphabetically"){
                var descMovieTitles = movietitles.sort();

                for(var x=0; x<23; x++){
                    var descIndex = originalTitles.indexOf(descMovieTitles[x]);
                    console.log("This is the index num of "+descMovieTitles[x]+" : "+descIndex);
                    movietitles[x] = document.querySelectorAll("h3")[descIndex].innerText;
                        Atag[x]= document.querySelectorAll("a")[descIndex].getAttribute("href");
                        imgURL[x]= document.querySelectorAll("img")[descIndex].getAttribute("src");
                }

                for(var n=0; n<23; n++){
                    imageDescUrl=document.querySelectorAll("img")[n];
                    descTitle = document.querySelectorAll(".movieContainer > h3")[n];
                    descTag = document.querySelectorAll("a")[n];
                    imageDescUrl.src = imgURL[n];
                    console.log(movietitles[n]);
                    descTitle.innerText =  movietitles[n];
                    descTag.href =Atag[n];
                    console.log(imageDescUrl);
                }
            }
        });

    </script>
</body>
</html>