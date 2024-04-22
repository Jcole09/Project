<?php
  include('servercon.php');
  //restrict direct page access
  if(!isset($_SESSION['txt_uname'])){
    header('Location: index.php');
  }

?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <script src="js/validation.js"></script>
    <script type="text/javascript" src="jQuery/jquery-3.6.1.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/style1.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <title>Registration Form</title>
    <head>
    <form name="searchrecords" action="<?php $_PHP_SELF ?>" method="post"> 
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6a0000;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="img/dhvsu.png" alt="" width="70" height="64" class="d-inline-block align-text-rigth">
    Registration Form
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="RFindex.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  </form>

    </head>
<body>
<?php
       $fnameErr = $lnameErr = $emailErr = $passErr = $cpassErr = $genderErr = $birthErr = $termsErr = "";
        $fname = $lname = $email = $pass = $cpass = $gender = $address = $dob = $terms = $message = "";
        //validation for password that must contain the following rules below
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST["pass"]) && isset( $_POST["pass"] ))
          $pass = $_POST["pass"];
          $cpass = $_POST["cpass"];
          if (mb_strlen($_POST["pass"]) <= 8) {
              $passErr = "Your Password Must Contain At Least 8 Characters!";
          }
          elseif(!preg_match("#[0-9]+#",$pass)) {
              $passErr = "Your Password Must Contain At Least 1 Number!";
          }
          elseif(!preg_match("#[A-Z]+#",$pass)) { 
              $passErr = "Your Password Must Contain At Least 1 Capital Letter!";
          }
          elseif(!preg_match("#[a-z]+#",$pass)) {
              $passErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
          }
          elseif(!preg_match("#[\W]+#",$pass)) {
              $passErr = "Your Password Must Contain At Least 1 Special Character!";
          } 
          elseif (strcmp($pass, $cpass) !== 0) {
              $cpassErr = "Passwords must match!";
          }
         else {
          $passErr = "Please enter password   ";
         }
        if (isset($_POST['submit'])) {
        if (empty($_POST["terms"])) 
          $termsErr = "Please check the box!";
      } 
      else {
          $terms = test_input($_POST["terms"]);
      }
      //dob
      if(isset($_POST['dob'])){

        $dob = $_POST['dob'];
        $today = date("d-m-Y");
        $diff = date_diff(date_create($dob), date_create($today));
        
        if($diff->format('%y%') < 18){
          $birthErr = "Must be 18 or older. ";
        }
      }
    }
       
    
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
    ?>

  <section>
    <div class="container">
      <div class="alert alert-warning text-center my-4">
      Final Project in Web Development
      </div>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="testForm" name="myForm" onsubmit="return ValidationForm()" required>
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Registration Form</h1>
            </div>
          </div>

          <div class="row align-items-center">
            <div class="col mt-4">
              First Name <span class="error">*</span>
              <input type="text" class="form-control" name="fname" id="fname">
              <div class="error" id="nameErr"></div>
            </div>
          </div>

          <div class="row align-items-center mt-4">
            <div class="col">
              Last Name <span class="error">*</span>
              <input type="text" class="form-control" name="lname" id="lname"> 
              <div class="error" id="lnameErr"></div>
            </div>
          </div>

          <div class="row align-items-center mt-4">
            <div class="col">
              E-mail address <span class="error">*</span>
              <input type="text" name="email" class="form-control">  
              <div class="error" id="emailErr"></div>           
            </div>
          </div>

          <div class="row align-items-center mt-4">
            <div class="col">
              Password <span class="error">*</span>
              <input type="password" class="form-control" name="pass">
            </div>
            <div class="col">
              Confirm Password <span class="error">*</span>
              <input type="password" class="form-control" name="cpass">
            </div>
          </div>
          <span class="error"><?php echo $passErr;?></span>
          <span class="error"><?php echo $cpassErr;?></span>

          <div class="row align-items-center mt-4">
            <div class="col">
              Address <span class="error">*</span>
              <input type="textarea" name="address" class="form-control">  
              <div class="error" id="AddErr"></div>            
            </div>
          </div>

          <div class="row align-items-center mt-4">
            <div class="col">
              Gender <span class="error">*</span>
              <br>
            <input type="radio" name="gender" value="Female">&nbsp;Female
            <input type="radio" name="gender" value="Male">&nbsp;Male  
            <div class="error" id="genderErr"></div>            
            </div>
          </div>

          <div class="row align-items-center mt-4">
            <div class="col">
              Birthday <span class="error">*<?php echo $birthErr;?></span>
              <input type="date" id="dob" name="dob" class="form-control">
              <div class="error" id="dobErr"></div>              
            </div>
          </div>
          
          <div class="row justify-content-start mt-4">
            <div class="col">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="terms" required> <span class="error">*</span>
                  I Read and Accept Terms and Conditions
                </label>
              </div>
              <span class="error"> <?php echo $termsErr;?></span>
              <button class="btn btn-primary mt-4" name = "createrecord" type="submit">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
<script src="jQuery/jquery_validation.js"></script>
</html>

<?php
if(isset($_POST['createrecord']))
{
  
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];


  $sqlstring = "INSERT INTO tableinfo (FirstName,LastName,EmailAddress,
                                        Pass,ConfirmPassword,Address,
                                        Gender,Birth) 
                VALUES ('$fname', '$lname','$email','$pass',
                '$cpass','$address','$gender','$dob')"; 
  
    
    if(mysqli_query($dbconnect, $sqlstring)){
        echo "New record created <br>";
        //$result = mysqli_num_rows($dbconnect);
        
    } else 
    {
        echo "Unable to execute the query.  Error code " . mysqli_error($dbconnect);
    }

}
mysqli_close($dbconnect);
?>