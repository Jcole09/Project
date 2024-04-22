<?php
    include('servercon.php');
    //restrict page direct access
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/template.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" 
    href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" 
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <title>Personal Website</title>

</head>
<body>
<form action="<?php $_PHP_SELF ?>" method="post">
    <section class="hero">
        <div class="main-width">
            <header>
                <div class="logo">
                    <i class="fa-solid fa-s"></i>
                </div>

                <nav>
                    <div class="hamb">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <ul class="nav-list">
                        <li><a href="#">Home</a></li>
                        <li><a href="RFindex.php">Records</a></li>
                        <li><a href="food.php">Food Menu</a></li>
                        <li><a href="home.php">Chevrolet</a></li>
                        <button class="btn btn-danger my-2 my-sm-0" type="submit" value="Logout" name="button_logout" id="btn1">Logout</button>
                    </ul>
                </nav>
            </header>

            <div class="container">
                <div class="hero-text">
                    <h3>Hi, There!</h3>
                    <h1>I am <span class="input"></span></h1>
                    <p>Test Web</p>
                    <div class="social">
                        <a href="https://www.facebook.com/satchdimalanta"><i class="fa-brands fa-facebook"></i></a>
                    </div>
                    <div class="bottom">
                        <p>© 2022 Satch. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var typed = new Typed(".input", {
            strings:["Justine Cole Reyes","Web Developer"],
            typeSpeed: 70,
            backspeed: 60,
            loop:true
        });
    </script>
</body>
</html>

