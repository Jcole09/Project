<?php 

include('servercon.php');

?>


<!doctype html>
<html lang="en">
  <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/regstyle.css">
  <style>
        header .header{
            height: 45px;
        }
        header a img{
            width: 134px;
            margin-top: 4px;
        }
        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }
        .login-page .form .login{
            margin-top: -31px;
            margin-bottom: 26px;
        }
        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

.form .message {
  margin: 15px 0 0;
  color: black;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body {
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
        .login h1{ 
            color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; 
        }
       
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Sign Up</title>
  </head>
  <body>
      <section class = "sec">
    <form name = "register" method = "post" action = "<?php $_PHP_SELF ?>">
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>Register</h3>
          </div>
        </div>
        <form class="login-form">
        <input type = "text" placeholder = "Username" name = "p_username" Required>
        <input type = "email" placeholder = "Email" name = "p_email" Required>
        <input type = "password" placeholder = "Password" name = "p_password" 
              required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
              title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number.">

        <input type = "password" placeholder = "Confirm Password" name = "p_password2" 
              required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$">
        <div class = "mb-3">
            <button type = "submit" class = "btn btn-primary" name = "registeruser">Register</button>
        </div>
            <p class = "message">Already have an account?<a href = "login.php"> Login here</a></p>
        </form>
        </div>
        </div>
          </section>
  </body>
</html>

<?php
    //this will insert a new registered account in your database
    if(isset($_POST['registeruser'])){
        $username = $_POST['p_username'];
        $emailadd = $_POST['p_email'];
        $password = $_POST['p_password'];
        $password2 = $_POST['p_password2'];
        $md5pass = md5($password);
        $md5pass2 = md5($password2);

        $sqlstring = "INSERT INTO users (username, email, password, VerifyPassword) VALUES ('$username','$emailadd','$md5pass','$md5pass2')";

        if(mysqli_query($dbconnect, $sqlstring)){
            header('Location: index.php');
        }
        else {
            echo "Unable to execute the query. Error code " . mysqli_error($dbconnect);
        }
        mysqli_close($dbconnect);
    }

?>