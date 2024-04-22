<?php 
include('servercon.php');
?>

<?php
//update records in database
if(isset($_POST['updaterecords']))
{
  $Emp_id = $_POST['displayid'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];

    $sqlstring = "UPDATE tableinfo SET FirstName = '$fname', LastName = '$lname', EmailAddress = '$email', Pass = '$pass', 
                                        ConfirmPassword = '$cpass', Address = '$address', Gender = '$gender', Birth = '$dob' WHERE ID = '$Emp_id'"; 
  
    
    if(mysqli_query($dbconnect, $sqlstring)){
        echo "Records Updated <br>";
              
    } else 
    {
        echo "Unable to execute the query.  Error code " . mysqli_error($dbconnect);
    }
   
    

}

?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" type="text/css" href="css/style1.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Update Records</title>
  </head>
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

<?php
        $fnameErr = $lnameErr = $emailErr = $passErr = $cpassErr = $genderErr = $birthErr = $termsErr = "";
        $fname = $lname = $email = $pass = $cpass = $gender = $address = $dob = $terms = $message =  $E_id = "";
        //validation for firstname
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
            $fnameErr = "Please enter a valid name";
        } 
        else {
            $fname = test_input($_POST["fname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
            $fnameErr = "Only letters and white space allowed";
            }
        }
        //validation for last name
        if (empty($_POST["lname"])) {
          $lnameErr = "Please enter a valid name";
      } 
      else {
          $lname = test_input($_POST["lname"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
          $lnameErr = "Only letters and white space allowed";
          }
      }
        //validation for email address
        if (empty($_POST["email"])) {
            $emailErr = "valid Email address";
        } 
        else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "The email address is incorrect";
            }
        }  
        //validation for password that must contain the following rules below
        if(!empty($_POST["pass"]) && isset( $_POST["pass"] )) {
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
          } else {
          $passErr = "Please enter password   ";
          }
          //output for address
        if (empty($_POST["address"])) {
            $address = "";
        } 
        else {
            $address = test_input($_POST["address"]);
        }   
        //gender validation
        if (empty($_POST["gender"])) {
            $genderErr = "Please select a gender";
        } 
        else {
            $gender = test_input($_POST["gender"]);
          //this is validation for the box before dispalying the inputs
        }
        if (isset($_POST['submit'])) {
        if (empty($_POST["terms"])) 
          $termsErr = "Please check the box!";
      } 
      else {
          $terms = test_input($_POST["terms"]);
      }
      //dob
      if(isset($_POST['submit'])){

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

    <?php 
    if(isset($_GET['updates_id'])){
      $E_id = $_GET['updates_id'];
      $sqlstring = mysqli_query($dbconnect, "SELECT * FROM tableinfo WHERE ID = '$E_id'");
      $r=mysqli_fetch_array($sqlstring);

      $fname = $r['FirstName'];
      $lname = $r['LastName'];
      $email = $r['EmailAddress'];
      $pass = $r['Pass'];
      $md5pass = md5($pass);
      $cpass = $r['ConfirmPassword'];
      $md5cpass = md5($cpass);
      $address = $r['Address'];
      $gender = $r['Gender'];
      $dob = $r['Birth'];

    }
    mysqli_close($dbconnect);
    ?>

 
   <section>
    <div class="container">
      <div class="alert alert-warning text-center my-4">
      Final Project in Web Development
      </div>
      <form method="post" name="updaterecords" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Update Record</h1>
            </div>
          </div>

          <div class="row align-items-center">
            <div class="col mt-4">
              ID
              <input type="text" class="form-control" name = "displayid" value="<?php echo $E_id; ?>">
            </div>
          </div>

          <div class="row align-items-center">
            <div class="col mt-4">
              First Name <span class="error">* <?php echo $fnameErr;?></span>
              <input type="text" class="form-control" name = "fname" value="<?php echo $fname; ?>" required>
            </div>
          </div>

          <div class="row align-items-center mt-4">
            <div class="col">
              Last Name <span class="error">* <?php echo $lnameErr;?></span>
              <input type="text" class="form-control" name = "lname" value="<?php echo $lname; ?>">
            </div>
          </div>

          <div class="row align-items-center mt-4">
            <div class="col">
              E-mail address <span class="error">* <?php echo $emailErr;?></span>
              <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">             
            </div>
          </div>

          <div class="row align-items-center mt-4">
            <div class="col">
              Password <span class="error">*</span>
              <input type="password" class="form-control" name="pass" value="<?php echo $pass; ?>">
            </div>
            <div class="col">
              Confirm Password <span class="error">*</span>
              <input type="password" class="form-control" name="cpass" value="<?php echo $cpass; ?>">
            </div>
          </div>
          <span class="error"><?php echo $passErr;?></span>
          <span class="error"><?php echo $cpassErr;?></span>

          <div class="row align-items-center mt-4">
            <div class="col">
              Address
              <input type="textarea" name="address" class="form-control" value="<?php echo $address; ?>">             
            </div>
          </div>

          <div class="row align-items-center mt-4">
            <div class="col">
              Gender <span class="error">* <?php echo $genderErr;?></span>
              <br>
            <input type="radio" name="gender" value="female">&nbsp;Female
            &nbsp;&nbsp;<input type="radio" name="gender" value="male">&nbsp;Male          
            </div>
          </div>

          <div class="row align-items-center mt-4">
            <div class="col">
              Birthday <span class="error">* <?php echo $birthErr;?></span>
              <input type="date" id="dob" name="dob" class="form-control" value="<?php echo $dob; ?>">             
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
              <button class="btn btn-primary mt-4" name="updaterecords">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
  </body>
</html>


