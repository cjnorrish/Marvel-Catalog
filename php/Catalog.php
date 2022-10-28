<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
</head>
<body>

<?php
    //loads the xml file
    $x=0;
    $xml=simplexml_load_file("../xml/catalog.xml") or die("Error Cannot create object");
    echo"<div class='header'>
    <h1>MARVEL INFINITY SAGA</h1>
    </div>";

    echo"<div id='marvelMovies'>";
        //loads the xml file into the php in a nice format
        foreach($xml->children() as $xml){
            
            $mName=$xml->title;
            $img =$xml->image;
            $imdbR=$xml->rating;
            $director=$xml->director;
            $MVlength =$xml->length; 
            echo"
            <div class='movieholder'>
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
                        <!--creates the search barr-->
                        <div class="grid-child">
                            <label for="SEARCH" class='search-label'>SEARCH</label><hr>
                            <input type="text" id="inputID-search" class="search-block" name="SEARCH" placeholder="Movie Name">
                            <!--submit button the the search field-->
                            <input type='submit' id='search-button' name='submit' value='SEARCH' class='search-block'>
                        </div>
                        <!--creates the order drop down box-->
                        <div class='grid-child'>
                        <label for='ORDER'  class='search-label'>ORDER</label><hr>
                        <select id='ORDER' name='ORDER' class='search-block'>
                            <option name='order1' value='releaseDate'>Release Date</option>
                            <option name='order2' value='alphabetically'>Alphabetically</option>
                        </select> 
                        </div>
                        <!--creates the orderby drop down box-->
                        <div class='grid-child'>
                        <label for='ORDERBY'  class='search-label'>ORDER BY</label><hr>   
                        <select id='ORDERBY' name='ORDERBY' class='search-block'>
                            <option name='orderBy1' value='asc'>Ascending</option>
                            <option name='orderBy2' value='desc'>Descending</option>
                        </select> 
                        </div> 
                        <!--creates the submit button for the order drop down boxes-->
                        <div class='grid-child'>
                            <input type='submit' id='sort-button' name='submit' value='SORT' class='search-block'>
                        </div> 
                    </div>               
                </form> 
            </div>
        
    <script type="text/javascript">
        //gets the variable for the search value input
        var input =  document.getElementById("inputID-search");
        console.log(input);
        
        //creates the movie container variable
        var moviesContainer = document.querySelectorAll("center");
        console.log(moviesContainer);
        //creates the movies variable
        var movies = document.querySelectorAll("div.movieContainer > h3");
        console.log(document.querySelectorAll(".movieContainer > h3")[1].innerText);


        //creates a const that stores the marvel divs
        const marvelDiv = document.getElementById("marvelMovies").innerHTML;
        
        //adds event listener to the search button to listen to and react when clicked
        document.getElementById("search-button").addEventListener("click", function() {

            //gets the searched movie from the user and stores in variable
            var searchedMovie = document.getElementById("inputID-search").value;
            console.log(searchedMovie);
            if(searchedMovie.length ==0){
                alert("No movie was searched. Please enter it the movie search bar. Thank you!");
            }
            //for loop that goes up to 23 and gets all values
            for(var i =0; i<24; i++){
                //gets the movie titles
                var movieTitles=document.querySelectorAll(".movieContainer > h3")[i].innerHTML;
                console.log(movieTitles);
                //if the users string matches the movie title it will 
                if( searchedMovie.toLowerCase()==movieTitles.toLowerCase()){
                    
                    //displays the correct movie while hiding the other movies
                    var movieDisplay = document.querySelectorAll(".movieholder")[i].innerHTML; 
                    console.log(movieDisplay + "movie :" + movieTitles.toLowerCase());
                    document.getElementById("marvelMovies").innerHTML = '';
                    document.getElementById("marvelMovies").innerHTML=movieDisplay;        
                }
            }
        });

        //creates event listener that uses updateValue funtion to update the searchbar results
        input.addEventListener('input', updateValue);
        //gets the search bar value and removes the search request if the amount of characters is less than 4
        function updateValue(e) {
            console.log(e.target.value);
            var searchVal = e.target.value;
            if(searchVal.length<4){
                document.getElementById("marvelMovies").innerHTML=marvelDiv;
            }
        }

    </script>


    <script type="text/javascript">

        //creates new event listener for the sort button
        document.getElementById("sort-button").addEventListener("click", function() {
            //declares variables 
            var order_Byinput = document.getElementById("ORDERBY").value;
            var order_input = document.getElementById("ORDER").value;
            var movietitles=[]; 
            const originalTitles=[];
            var imgURL=[];
            var Atag=[];

            //for loop that goes from 0 to 22, going up 1+
            //gets the array of orignal titles
            for(var i = 0; i < 23; i++){
                originalTitles[i] = document.querySelectorAll("h3")[i].innerText;
            }

            //if the release date box and descending box is clicked
            if (order_Byinput== "desc" && order_input == "releaseDate") {
                for(var i = 0; i < 23; i++){
                        
                    movietitles[i] = document.querySelectorAll("h3")[i].innerText;
                    Atag[i]= document.querySelectorAll("a")[i].getAttribute("href");
                    imgURL[i]= document.querySelectorAll("img")[i].getAttribute("src");
                        
                }
                
                //declares variables
                var imageDescUrl;
                var descTitle;
                var descTag;
                var indexDesc=0;
                //for loops that increments from 22 to 0
                for(var j = 22; j > -1; j--){
                    //gets every element of the movie container from 0 to 22
                    imageDescUrl=document.querySelectorAll("img")[j];
                    descTitle = document.querySelectorAll(".movieContainer > h3")[j];
                    descTag = document.querySelectorAll("a")[j];
                    //sets the movie container with the decending order when printed out
                    imageDescUrl.src = imgURL[indexDesc];
                    console.log(movietitles[indexDesc]);
                    descTitle.innerText =  movietitles[indexDesc];
                    descTag.href =Atag[indexDesc];
                    console.log(imageDescUrl);
                    //adds 1 to the indexDesc variable
                    indexDesc++;
                }
        

            }
            //else if the user seleceted ascending and release date
            else if(order_Byinput== "asc" && order_input == "releaseDate") {
                //remove all marvel movies on screen
                document.getElementById("marvelMovies").innerHTML = '';
                //restore the orignal format of marvel movies (release date of m)
                document.getElementById("marvelMovies").innerHTML = marvelDiv;
            }

            //for i going up to 22
            for(var i = 0; i < 23; i++){
                //get the title of each movie
                movietitles[i] = document.querySelectorAll("h3")[i].innerText;
            }

            //if the user has selected alphabetically and Descending
            if(order_input == "alphabetically" && order_Byinput== "desc") {

                //sort the movies titles in alphabetical order and reverse the order of them
                var descMovieTitles = movietitles.sort().reverse();

                //for all movies in xml
                for(var x=0; x<23; x++){
                    //get the orignal index of each movie while ordered descending and alphabetical titles
                    var descIndex = originalTitles.indexOf(descMovieTitles[x]);
                    //gets the elements needed for each movie
                    movietitles[x] = document.querySelectorAll("h3")[descIndex].innerText;
                    Atag[x]= document.querySelectorAll("a")[descIndex].getAttribute("href");
                    imgURL[x]= document.querySelectorAll("img")[descIndex].getAttribute("src");
                }

                //for all movies in xml
                for(var n=0; n<23; n++){
                    //swaps the order so it is in the alphabetical and descending and prints it to catalog
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

            //if the user selects ascending and alphabetically
            else if(order_Byinput== "asc" && order_input== "alphabetically"){
                //sorts the titles of movies into alphabetical order
                var descMovieTitles = movietitles.sort();

                //for all movies in xml
                for(var x=0; x<23; x++){
                    //get the orignal index of each movie while ordered alphabetical and ascending titles
                    var descIndex = originalTitles.indexOf(descMovieTitles[x]);
                    //gets the elements needed for each movie
                    movietitles[x] = document.querySelectorAll("h3")[descIndex].innerText;
                    Atag[x]= document.querySelectorAll("a")[descIndex].getAttribute("href");
                    imgURL[x]= document.querySelectorAll("img")[descIndex].getAttribute("src");
                }

                //for all movies in xml
                for(var n=0; n<23; n++){
                    //swaps the order so it is in the alphabetical and ascending and prints it to catalog
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