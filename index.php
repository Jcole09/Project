<?php
include('servercon.php');
//checking for valid account 
if(isset($_POST['but_submit'])){
    $uname = mysqli_real_escape_string($dbconnect, $_POST['txt_uname']);
    $password = mysqli_real_escape_string($dbconnect, $_POST['txt_pwd']);
    $md5pass = md5($password);

    if ($uname != "" && $md5pass != "") {
        $sql_query = "SELECT count(*) as cntUser from users where username='". $uname . "' and password='" . $md5pass."'";
    $result = mysqli_query($dbconnect, $sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];
    //if account is valid it will direct you in main page which is template.php 
    if($count > 0){
        $_SESSION['txt_uname'] = $uname;
        header('Location: template.php');
    }
    else{
        
        echo "Invalid username and password";
    }
  }
}

?>
<html>
<head>
    <link rel="stylesheet" href="css/index.css">
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

     <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    
    <title>Login Page</title>
  
</head>

  <body class="bg-imgs">
  <section class = "sec">
    <form method = "post" action = "">
    <div class="find-page">
      <div class="form">
        <div class="find">
          <div class="find-header">
            <h1>Login</h1>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
        <form class="find-form">
          <input type="text" id = "txt_uname" name = "txt_uname" placeholder="Username"/>
          <input type="password" id = "txt_uname" name = "txt_pwd" placeholder="Password"/>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary"  id="but_submit" name="but_submit">Login</button>
        </div>  
          <p class="message">Not registered? <a href="register.php">Create an account</a></p>
        </form>
      </div>
    </div>
    </div>
</div>
</section>
</body>
</html>
