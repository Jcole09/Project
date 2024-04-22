<?php
    include('servercon.php');
    
    //restrict direct page access
   if(!isset($_SESSION['txt_uname'])){
      header('Location: index.php');
  }
  //this will direct you in login page if you click the logout button
  if(isset($_POST['button_logout'])){
      session_destroy();
      header('Location: index.php');
  }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/homestyle2.css">
    <link rel="stylesheet" type="text/css" href="css/homestyle1.css">
    <link rel="stylesheet" type="text/css" href="css/reviews.css">

</head>
<body>
<div class="container">
<form action="<?php $_PHP_SELF ?>" method="post">
  <div class="navbar">
    <img src="img/chevrolet.jpg" class="logo">
    <nav>
      <ul id="menuList">
      <li><a href="template.php">Home</a></li>
      <li><a href="Cars.php" class="active">Vehicles</a></li>
          <li><a href="#contacts">About</a></li>
          <li><a href="#mid">Best Offers</a></li>
          <li><a href="#contacts">Contacts</a></li>
          <li><a href="#testi">Testimonials</a></li>
          <li><a href="add.php">Manage Database</a></li>
          <button class="btn btn-danger my-2 my-sm-0" type="submit" value="Logout" name="button_logout" id="btn1">Logout</button>
      </ul>
    </nav>
    <img src="img/fa-bars.png" class="menu-icon" onclick="togglemenu()">
</div>
<script>
        var menuList = document.getElementById("menuList");
        menuList.style.maxHeight = "0px";
        function togglemenu(){
          if(menuList.style.maxHeight == "0px")
          {
            menuList.style.maxHeight = "130px";
          }
          else{
            menuList.style.maxHeight = "0px";
          }
        }
      </script>
      </form>
<div class="row">
  <div class="col-1">
  <h2>Chevrolet<br>Camaro</h2>
  <p>Unmistakable Camaro styling is punctuated by a large, low grille that cools and reduces drag for aerodynamic performance, and distinctive accents that will turn heads on any street.</p>
  <br><button type="button" class="discover-btn" id="btn"><a href="Cars.php">Buy Now</a><i class="fa fa-arrow-circle-o-right"></i></button>

</div>
  <div class="col-2">
    <div><img src="img/1.png" class="car"></div>
    <div class="color-box"></div>
  </div>
</div>
<div class="row1">
  <div class="col-3">
  <h3 id="mid">Best Offer</h3>
  <h2>Chevrolet<br>Corvette</h2>
  <p>Precision makes its presence known.
The mid-engine marvel continues to carve its legacy with every push of the ignition. Get behind the wheel and experience the balance of design and performance that puts Corvette.</p>
  <br><button type="button" class="discover-btn" id="btn"><a href="h.php">See All Cars<i class="fa fa-arrow-circle-o-right"></a></i></button>
  </div>
  <div class="col-4">
  <div><img src="img/3.png" class="car1"></div>
    <div class="color-box1"></div>
  </div>
</div>
<div class="row2">
  <div class="col-5">
  <h3 id="mid">Best Offer</h3>
  <h2>Chevrolet<br>Chevelle</h2>
  <p>The Chevrolet Chevelle is a mid-sized automobile that was produced by Chevrolet in three generations for the 1964 through 1978 model years.</p>
  <br><button type="button" class="discover-btn" id="btn"><a href="h.php">See All Cars<i class="fa fa-arrow-circle-o-right"></a></i></button>
  </div>
  <div class="col-6">
  <div><img src="img/2.png" class="car2"></div>
    <div class="color-box2"></div>
  </div>
</div>
<div class="rev-section">
<h2 class="title" id="testi">Testimonials</h2>
<div class="reviews">
<div class="review">
   <div class="head-review">
      <img src="https://images.unsplash.com/photo-1488161628813-04466f872be2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=80" width="250px" class="imgg">
   </div>
   <div class="body-review">
      <div class="name-review">Nathan D.</div>
      <div class="place-review">Customer, CHEVROLETE CORVETTE Owner</div>
      <div class="rating">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half"></i>
      </div>
      <div class="desc-review">Auto Dealer has nice cars, great prices, and good service. I brought my old Citroen C4 with which I had no problems after one month of high mileage use. High price given to me for my car and low price accepted for the car I was buying was a huge surprise to me. I recommend this car dealer to everyone!</div>
   </div>
</div>
<div class="review">
   <div class="head-review">
      <img src="https://images.unsplash.com/photo-1479936343636-73cdc5aae0c3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" width="250px" class="imgg">
   </div>
   <div class="body-review">
      <div class="name-review">Mary Will</div>
      <div class="place-review">Customer, CHEVROLETE TAHOE Owner</div>
      <div class="rating">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
      </div>
      <div class="desc-review">I’m glad to be a happy owner of my dream car, Chevrolete Corvette, which I bought thanks to the recommendations of your consultants. The whole process of purchasing was very smooth and the price was not too high for me. I will definitely recommend this car dealer to all my friends.</div>
   </div>
</div>
<div class="review">
   <div class="head-review">
      <img src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" width="250px" class="imgg">
   </div>
   <div class="body-review">
      <div class="name-review">Kevin Tuck</div>
      <div class="place-review">Customer, CHEVROLETE CAMARO Owner</div>
      <div class="rating">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half"></i>
      </div>
      <div class="desc-review">You guys are really amazing! I have not yet seen a car dealer who offers so much at such an affordable price. I have found what I wanted in your vehicle catalog. Moreover, I have sold my old car with the help of your website and your staff provided me with the considerable discount for my new car.</div>
   </div>
</div>

</div>

</div>
</div>
<div class="main-content">
        <div class="left box">
          <h2 id="contacts">About us</h2>
          <div class="content">
            <p>#1 PLACE FOR ALL YOUR AUTOMOTIVE NEEDS -
Auto Dealer is a leading digital automotive marketplace designed to connect vehicle buyers and sellers. Our website lets you research and compare new, certified and used cars by searching for body type, mileage, price and numerous other criteria.</p>
            <div class="social">
              <a href="#"><span class="fab fa-facebook-f"></span></a>
              <a href="#"><span class="fab fa-twitter"></span></a>
              <a href="#"><span class="fab fa-instagram"></span></a>
              <a href="#"><span class="fab fa-youtube"></span></a>
            </div>
          </div>
        </div>
        <div class="center box">
          <h2>Address</h2>
          <div class="content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Pampanga</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text">+6301234567890</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">qwerty@example.com</span>
            </div>
          </div>
        </div>
        <div class="right box">
          <h2>Contact us</h2>
          <div class="content">
            <form action="#">
              <div class="email">
                <div class="text">Email *</div>
                <input type="email" required>
              </div>
              <div class="msg">
                <div class="text">Message *</div>
                <textarea rows="2" cols="25" required></textarea>
              </div>
              <div class="btn">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="bottom">
        <center>
          <span class="credit">Created By Satch Dimalanta</a> | </span>
          <span class="far fa-copyright"></span><span> 2022 All rights reserved.</span>
        </center>
      </div>
</body>
</html>