<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
</head>
<body>
<?php
//gets the image elements
  isset($_GET['img']); 
  isset($_GET['t']);
  isset($_GET['rt']);
  isset($_GET['dt']); 
  isset($_GET['l']); 
  
?>
    <div class='header'>
        <!--creates main heaer-->
        <h1>MARVEL INFINITY SAGA</h1>
        </div>
        
        <div class='selectedMovie'> 

        <!--creates a display which gives the user more information about the selected movie getting information from GET-->
           <div class='grid-child1'><img src=<?php echo $_GET['img']; ?> alt='Selected movie detail' id='detail-img'></div>
           <div class='grid-child1'id=movie-details> 
                <h2> <?php echo $_GET['t']; ?> </h2><hr>
                <h4>Director : <span id='director'> <?php echo $_GET['dt']; ?><span></h4> 
                <h4>Movie Length : <span id='movieSpan'> <?php echo $_GET['l']; ?><span></h4> 
                <h4>IMDB Rating : <span id='rating'> <?php echo $_GET['rt']; ?><span></h4> 

                <!--button that uses post to go back to catalog.php-->
                <form method='POST' action='Catalog.php'><input type='submit' value='Back to Movielist' id='btn-backtoHome'/></form>
           </div>
        </div>
    
</body>
</html>