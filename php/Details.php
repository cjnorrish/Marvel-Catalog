<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
</head>
<body>
<?php
    echo"<div class='header'>
        <h1>MARVEL INFINITY SAGA</h1>
        </div>
        
        <div class='selectedMovie'> 

           <div class='grid-child1'><img src='../images/movie1.jpg' alt='Selected movie detail' id='detail-img'></div>
           <div class='grid-child1'id=movie-details> 
                <h2>Title</h2><hr>
                <h4>Director : <span id='director'><span></h4> 
                <h4>Movie Length : <span id='movieSpan'><span></h4> 
                <h4>IMDB Rating : <span id='rating'><span></h4> 

                <form method='POST' action='Catalog.php'><input type='submit' value='Back to Movielist' id='btn-backtoHome'/></form>
           </div>
        </div>


        ";

?>
</body>
</html>