<?php include('config.php')?>
<?php
session_start();

if(!isset($_SESSION['username'])){
    $_SESSION['msg']="You must log in first to view this page";
    header("location: login.php");
}

if (isset($_GET['logout'])) {

    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blue Electronics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel = "stylesheet" href="index1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#flip").click(function(){
            $("#logo").slideToggle("slow");
            });
        });
</script>       
</head>
<body>        
<div id ="flip">Blue Electronics</div>
<nav> 
<div id = "logo">Home
        <ul>
            <li><a class ="active" href="#">Home</a></li>  
            <li><a href="cart.php">Cart</a></li>
            <li><a href="index.php?logout='1">Log Out</a></li> 
        </ul>
    </div>
</nav>
<div class="image-container">
        <div class="slide">
            <img src="newarrivals1.jpg" style = "height : auto; width : 100%;">
        </div>
        <div class="slide">
            <img src="newarrivals2.jpg" style = "height : auto; width : 100%;">
        </div>
        <div class="slide">            
            <img src="newarrivals3.png" style = "height : auto; width : 100%;">
        </div>
        <a class="previous" onclick="moveSlides(-1)">
            <i class="fa fa-chevron-circle-left"></i>
        </a>
        <a class="next" onclick="moveSlides(1)">
            <i class="fa fa-chevron-circle-right"></i>
        </a>
</div>
<div style= "text-align:center">
        <span class="footerdot" 
            onclick="activeSlide(1)">
        </span>
        <span class="footerdot"
            onclick="activeSlide(2)">
        </span>
        <span class="footerdot" 
            onclick="activeSlide(3)">
        </span>
</div>
</div>
<h2>Let's Shop!</h2>
<br>
<h2>Select your Item of Interest</h2>
<div class="content">
        <a href="mobile.php"><img src="mobiles.jpg" style= " width: 200px;
    height: auto;"></a>
         <a href="tv.php"><img src="tv.jpg"  style= " width: 200px;
    height: auto;"></a>
         <a href="laptop.php"><img src="laptops.jpg"  style= " width: 200px;
    height: auto;"></a>
         <a href="camera.php"><img src="camera.png"  style= " width: 200px;
    height: auto;" ></a>
</div>
<div class="footer">
  <div class="contain">
  <div class="col">
    <h1>Blue Electronics</h1>
    <h1>It is a project developed only for Educational Purposes</h1>
  </div>
  <div class="col">
    <h1>Menu</h1>
    <ul>
      <li><a href="index.php"></a>Home</li>
      <li><a href="cart.php"></a>Cart</li>
    </ul>
  </div>
  <div class="col">
    <h1>Products</h1>
    <ul>
      <li><a href="mobile.php"></a>Mobile</li>
      <li><a href="laptop.php"></a>Laptop</li>
      <li><a href="tv.php"></a>TV</li>
      <li><a href="camera.php"></a>Camera</li>
    </ul>
  </div>
  <div class="col social">
    <h1>Cards Accepted</h1>
    <i class="fa fa-cc-visa" style="color:navy;"></i>
    <i class="fa fa-cc-mastercard" style="color:red;"></i>
    </div>
  <div class="clearfix"></div>
</div>
</div>
<script>
var slideIndex = 1;
        displaySlide(slideIndex);
   
        function moveSlides(n) {
            displaySlide(slideIndex += n);
        }
   
        function activeSlide(n) {
            displaySlide(slideIndex = n);
        }
        function displaySlide(n) {
            var i;
            var totalslides = 
                document.getElementsByClassName("slide");
              
            var totaldots = 
                document.getElementsByClassName("footerdot");
              
            if (n > totalslides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = totalslides.length;
            }
            for (i = 0; i < totalslides.length; i++) {
                totalslides[i].style.display = "none";
            }
            for (i = 0; i < totaldots.length; i++) {
                totaldots[i].className = 
                totaldots[i].className.replace(" active", "");
            }
            totalslides[slideIndex - 1].style.display = "block";
            totaldots[slideIndex - 1].className += " active"; 
        }   
</script>
</body>
</html>