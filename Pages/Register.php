<?php
    require_once '../Database/connStatus.php';

    if(!is_connected()){
    include '../Components/internetError.php';

    return ;
    }
?>

<!--Session-->
<?php 
session_start();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riddlezz_Register</title>
</head>
<!--Validation-->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  
  function validateLoginForm(){
    var emailCheck = document.forms["LoginForm"]["email"].value
    var contactCheck = document.forms["LoginForm"]["contact_no"].value
    var otpCheck = document.forms["LoginForm"]["otp"].value

    console.log("in there")

    if(emailCheck == ""){
      alert("Please enter your VES Email ID")
      return false
    }

    if(contactCheck == ""){
      alert("Please enter your contact number")
      return false
    }

    if(otpCheck == ""){
      alert("Please enter the OTP sent to your mail")
      return false
    }
    document.forms["LoginForm"].action="../Backend/auth.php"

  }
</script>
<body>

    <!--Header-->
    <?php include '../Components/header.php'?>

      
      <!--Login-->
      <div class="card col-4 mx-auto my-5 bg-light">
        <h1 class="card-title mx-auto mt-3">Register</h1>
          <!--Form-->
          <form name="LoginForm" method="POST" onsubmit="return validateLoginForm()">
                <!--Email-->
                <div class="input-group mt-5 mb-3 mx-5" style="width: 80%;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" name="email" class="form-control" placeholder="Email ID" aria-label="email" aria-describedby="basic-addon1">
                </div>
                <!--Contact Number-->
                <div class="input-group mb-3 mb-2 mx-5" style="width: 80%;"  >
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="" name="contact_no" class="form-control" placeholder="Contact Number" aria-label="contact_no" aria-describedby="basic-addon1">
                </div>
                <!--OTP-->
                <div class="input-group mb-3 mb-2 mx-5" style="width: 80%;"  >
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input id="OTPinput" type="text" name="otp" class="form-control" placeholder="OTP" aria-label="otp" aria-describedby="basic-addon1">
                </div>
                

                <button type="submit" id="login" value="Submit" class="btn btn-primary mt-2 mb-4" style="margin-left:45%">Submit</button>
                <?php
                  if(isset($_SESSION['loginStatus'])=='failed'){
                    print "<div class=\"alert alert-danger mx-5 \" role=\"alert\">
                              Invalid Credentials
                           </div>";  
                    $_SESSION['loginStatus'] = null;
                  }
                  
                  if(isset($_SESSION['loginStatus3'])=='failed'){
                    print "<div class=\"alert alert-danger mx-5 \" role=\"alert\">
                              Your profile is incomplete.
                           </div>";  
                    $_SESSION['loginStatus3'] = null;
                  }
                ?>
          </form>
      </div>

    <!--Footer-->
    <?php include '../Components/footer.php';?>  

</body>
</html>


