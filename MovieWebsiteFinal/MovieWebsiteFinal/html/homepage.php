script<?php

require __DIR__ . ("/functions.php");



session_start();

$user = null;

if(isset($_SESSION["user_id"])){

    // echo "<script>alert('User is set');</script>";

    $mysqli = require __DIR__ . "/Login/database.php";

    $sql = "SELECT * FROM user_table
            WHERE userId = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

require __DIR__ . ("/db.php");

// Fetches all movie datas

$result = fetchAll("movie_table");

// Fetches movie count

$count = countRows("movie_table");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--this tag VIEWPORT META ensures your website scales correctly on different devices-->

    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/homepage.js" defer></script>
</head>



<body>

<div>
    <div class="navbar">

        <!--N a v i g a t i o n-->
        
        <!--logo-->
        <div class="nav-left"> 
         <img src="../pics/logo.png" alt="logo" class="logo">
        </div>

        <!--navigation texts / links -->
        <div class="nav-center">
          <nav>

              <a href="homepage.php" id="home">Home</a>
              <a href="schedmenu.html" id="schedule">Schedule</a>
              <a href="cinemas.html" id="cinemas">Cinemas</a>
              <a href="eventsandexp.html" id="eventsandexp">Events and Experiences</a>
              
              <?php if($user['isAdmin']): ?>
              <a href="login/dashboard.php" id="dashboard">Dashboard</a>
              <?php endif; ?>
          
          </nav>
      </div>

        
      <div class="nav-right">
            <a href="#notification"><img src="../pics/notif (1).png" id="notifBox" alt="Notifications"></a>
            <a href="profile"><img src="../pics/profile (1).png" id="profileBox" alt="Profile"></a>
        </div>

</div>

<div class="poster">
  <div class="poster-content">
    <img src="../pics/3.jpg" alt="Poster" class="poster-image">
    <img src="../pics/2.jpg" alt="Poster" class="poster-image">
    <img src="../pics/1.jpg" alt="Poster" class="poster-image">
    <img src="../pics/4.jpg" alt="Poster" class="poster-image">
    <img src="../pics/5.jpg" alt="Poster" class="poster-image">

  </div>

  <div class="arrow"> 

    <div class="arrow-left">
      <i class="fas fa-chevron-left"></i>
    </div>

    <div class="arrow-right">
      <i class="fas fa-chevron-right"></i>
  </div>
</div>

    </div>

    <div class="welcometext">
      <h1 class="poster-title">Welcome to CINEMUST!&nbsp;&nbsp;&nbsp;<?= $user["firstName"] ?></h1>
    </div>

    
   <div class="dark-line"></div>


<div class="quote-container">
    <blockquote class="quote"><h3>
      "Your next movie adventure is just a click away!
       Enjoy fast booking and let the show begin!" </h3>
    </blockquote>
    <a href="eventsandexp.html"  class="book-now-button">Book Now</a>
</div>




 <!--COMING SOON-->
    <section>
      <h2>Coming Soon!</h2>

    </section>


    <div class="bodycontent">

      <div class="movie-poster">

        <img src="../pics/GreatestShowman.jpg" alt="Movie 1 Poster">
        <small>Greatest Showman </small>
        <br>
        <button class="navButton" id="comingSoonButton1">Coming Soon!</button>
        </div>

        <div class="movie-poster">

          <img src="../pics/lesserafim.jpg" alt="Movie 2 Poster">
          <small>Unforgiven</small>
          <br>
          <button class="navButton" id="comingSoonButton2">Coming Soon!</button>
          </div>

        <div class="movie-poster">

         <img src="../pics/nam.jpg" alt="Movie 3 Poster">
         <small>Dat Rung </small>
          <br>
          <button class="navButton" id="comingSoonButton3">Coming Soon!</button>          </div>

        <div class="movie-poster">

        <img src="../pics/HarryPotter.jpg" alt="Movie 4 Poster">
        <small>Harry Potter </small>
        <br>
        <button class="navButton" id="comingSoonButton4">Coming Soon!</button>        </div>

        <div class="movie-poster">

        <img src="../pics/Joker.jpg" alt="Movie 5 Poster">
        <small>Joker </small>
        <br>
        <button class="navButton" id="comingSoonButton5">Coming Soon!</button>
        </div>

        <div class="movie-poster">

          <img src="../pics/LittleWomen.jpg" alt="Movie 6 Poster">
          <small>Little Women </small>
        <br>
        <button class="navButton" id="comingSoonButton6">Coming Soon!</button>
        </div>

        <div class="movie-poster">

          <img src="../pics/Parasite.jpg" alt="Movie 7 Poster">
          <small>Parasite </small>
        <br>
        <button class="navButton" id="comingSoonButton7">Coming Soon!</button>
        </div>


        <!--COMING SOON BUTTON when they click the button-->
        <div id="comingSoonModal" class="modal">
          <div class="modal-content">
            <p>Coming Soon! </p>
            <br>
            <span class="close-button">Close &times;</span>
          
          </div>
        </div>



      </div>
</div>




<!--N O W   S H O W I N G -->

    <section>

      <h2>Now Showing!</h2>

    <div class="bodycontent">

        <?php foreach($result as $row): ?>
          
        <div class="movie-poster">
 
         <img src="<?= $row["dir"] ?>" alt="Movie 1 Poster">
         <small><?= $row["title"] ?></small>
         <br>
         <form action="movieClicked.php" method="POST">
           
           <input type="hidden" name="movieId" value="<?= $row["movieId"] ?>">
           <button type="submit" name="submit" class="navButton">View Movie!</button>
         
         </form>
         </div> 
 
         <?php endforeach; ?>

        <!-- <div class="movie-poster">

            <img src="../pics/GirlsNight.jpg" alt="Movie 3 Poster">
            <small>Mean Girls </small>
            <br>
            <button onclick="location.href='movieClicked2.html'" class="navButton">View Movie!</button>
            </div>

        <div class="movie-poster">

        <img src="../pics/Spiderman.jpg" alt="Movie 4 Poster">
        <small>Spiderman</small>
        <br>
        <button onclick="location.href='movieClicked.html'" class="navButton">View Movie!</button>
  
        </div>

        <div class="movie-poster">

        <img src="../pics/BeautyandtheBeast.jpg" alt="Movie 5 Poster">
        <small>Beauty & Beast</small>
        <br>
        <button onclick="location.href='movieClicked5.html'" class="navButton">View Movie!</button>
        
        </div>

        <div class="movie-poster">

         <img src="../pics/Adventure.jpg" alt="Movie 6 Poster">
         <small>Archer </small>
        <br>
        <button onclick="location.href='movieClicked6.html'" class="navButton">View Movie!</button>
        
        </div>

        <div class="movie-poster">

          <img src="../pics/Ponyo.jpg"  alt = "Movie 7 Posters">
          <small>Ponyo </small>
        <br>
        <button onclick="location.href='movieClicked7.html'" class="navButton">View Movie!</button>
        
        </div> -->

    </div>





<!--CATEGORY-->
<section>

  <H2>Category</H2>
  <div class="bodycontent">
    <div class="movie-poster">

      <img src="../pics/kids.jpg" alt="Category">

      <br>
      <button class="navButton">Kids</button>
      </div>

      <div class="movie-poster">

        <img src="../pics/horror.jpg" alt="Categoryr">
       
        <br>
        <button class="navButton">Horror</button>
        </div>

      <div class="movie-poster">

          <img src="../pics/docu.jpg" alt="Category">
         
          <br>
          <button class="navButton">Documentary</button>
          </div>

      <div class="movie-poster">

      <img src="../pics/action.jpg" alt="Category">
     
      <br>
      <button  class="navButton">Action</button>

      </div>

      <div class="movie-poster">

      <img src="../pics/girly.jpg" alt="Category">
     
      <br>
      <button class="navButton">Comedy</button>
      </div>

      <div class="movie-poster">

       <img src="../pics/action.jpg" alt="Category">
      
      <br>
      <button class="navButton">Fantasy</button>
      </div>

      <div class="movie-poster">

        <img src="../pics/romance.jpg"  alt="Category">
        
      <br>
      <button class="navButton">Romance</button>
      </div>

  </div>

<!--FOOTER-->

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="footer-col">
        
        <h4>Cinemust</h4>
          <ul>

            <li><a href="#">About us</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
            
          </ul>
      </div>

      <div class="footer-col">
        <h4>Get Help</h4>
          <ul>
            <li><a href="#">FAQ's</a></li>
            <li><a href="#">Payment Options</a></li>
            <li><a href="#">Locations</a></li>
          </ul>
      </div>

    
      <div class="footer-col">
        <h4>follow us</h4>
        <div class="social-links">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        


  </div>
</footer>
    
</body>



</html>