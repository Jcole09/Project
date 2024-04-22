<?php
    include('servercon.php');
    
    //restrict direct page access
   if(!isset($_SESSION['txt_uname'])){
      header('Location: index.php');
  } 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Menu</title>
        <link rel="stylesheet" type="text/css" href="css/foodmenu.css"/>

        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    </head>
    <body>

        <header>
            <a href="#" class="logo">Satchi</a>
            <div class="bx bx-menu" id="menu-icon"></div>

            <ul class="navbar">
                <li><a href="food.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#services">Service</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </header>
        
        <!---home start--->
        <section class="home" id="home">
            <div class="home-text">
                <h1>Today's <br> Menu</h1>
                <h2>Food The <br> Most Precious Things</h2>
            </div>
        </section>

        <!---menu start--->
        <section class="menu" id="menu">
            <div class="heading">
                <span>Food Menu</span>
                <h2>Fresh taste and great price</h2>
            </div>

            <div class="menu-container">
                <div class="box">
                    <div class="box-img">
                        <img src="img/food/food1.png">
                    </div>
                    <h2>Chicken Burger</h2>
                    <h3>Tasty Food</h3>
                    <span>PHP 110.00</span>
                    <i class='bx bx-cart-alt'></i>
                </div>

                <div class="box">
                    <div class="box-img">
                        <img src="img/food/food2.png">
                    </div>
                    <h2>Special Beef Burger</h2>
                    <h3>Tasty Food</h3>
                    <span>PHP 110.00</span>
                    <i class='bx bx-cart-alt'></i>
                </div>

                <div class="box">
                    <div class="box-img">
                        <img src="img/food/food3.png">
                    </div>
                    <h2>Chicken Fry Pack</h2>
                    <h3>Tasty Food</h3>
                    <span>PHP 110.00</span>
                    <i class='bx bx-cart-alt'></i>
                </div>
            </div>
        </section>

        <!---sevice start--->
        <section class="services" id="services">
            <div class="heading">
                <span>Services</span>
                <h2>We provide best quality food</h2>
            </div>

            <div class="service-container">
                <div class="s-box">
                    <img src="img/food/s1.png">
                    <h3>Order</h3>
                    <p>Nalulong po ako sa online betting Nalulong po ako sa online betting Nalulong po ako sa online betting</p>
                </div>

                <div class="s-box">
                    <img src="img/food/s2.png">
                    <h3>Shipping</h3>
                    <p>Nalulong po ako sa online betting Nalulong po ako sa online betting Nalulong po ako sa online betting</p>
                </div>

                <div class="s-box">
                    <img src="img/food/s3.png">
                    <h3>Delivered</h3>
                    <p>Nalulong po ako sa online betting Nalulong po ako sa online betting Nalulong po ako sa online betting</p>
                </div>
            </div>
        </section>

        <!---call to action start--->
        <section class="cta">
            <h2>We make quality food <br> Everyday</h2>
            

            <button class="btn" onclick="myFunction()">Let's Talk</button>

            <script>
                function myFunction() {
                    alert("Please contact 09668690010");
                }
            </script>
        </section>

        <!---footer start--->
        <section id="contact">
            <div class="footer">
                <div class="main">
                    <div class="col">
                        <h4>Menu Link</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Menu</a></li>
                            <li><a href="#">Service</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col">
                        <h4>Our Services</h4>
                        <ul>
                            <li><a href="https://www.facebook.com/satchdimalanta">Web Design</a></li>
                            <li><a href="https://www.facebook.com/satchdimalanta">Web Development</a></li>
                        </ul>
                    </div>
                    
                    <div class="col">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                    
                    <div class="col">
                        <h4>Contact Us</h4>
                        <div class="social">
                            <a href="https://www.facebook.com/satchdimalanta"><i class='bx bxl-facebook' ></i></a>
                            <a href="#"><i class='bx bxl-instagram' ></i></a>
                            <a href="#"><i class='bx bxl-twitter' ></i></a>
                        </div>
                    </div>
                </div>
            </div> 
        </section>

        <!---javascript--->
       <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>