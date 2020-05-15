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
    <title>Riddlezz_Login</title>
</head>
<!--Validation-->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

  function validateLoginForm(){
    var emailCheck = document.forms["LoginForm2"]["email"].value
    var otpCheck = document.forms["LoginForm2"]["otp"].value

    console.log("in there")

    if(emailCheck == ""){
      alert("Please enter your VES Email ID")
      return false
    }

    if(otpCheck == ""){
      alert("Please enter the OTP sent to your mail")
      return false
    }
    document.forms["LoginForm2"].action="../Backend/authLogin.php"

  }
</script>
<body style="background-image: url('../Images/puzzle.jpg');">

    <!--Header-->
    <?php include '../Components/header.php'?>

      
      <!--Login-->
      <div class="card col-4 mx-auto my-5 bg-light">
        <h1 class="card-title mx-auto mt-3">Login</h1>
          <!--Form-->
          <form name="LoginForm2" method="POST" onsubmit="return validateLoginForm()">
                <!--Email-->
                <div class="input-group mt-5 mb-3 mx-5" style="width: 80%;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input autocomplete="off" type="email" required name="email" class="form-control" placeholder="Email ID" aria-label="email" aria-describedby="basic-addon1">
                </div>
                <!--OTP-->
                <div class="input-group mb-3 mb-2 mx-5" style="width: 80%;"  >
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input autocomplete="off" id="OTPinput" type="tel" pattern="[0-9]{4}" required name="otp" class="form-control" placeholder="OTP" aria-label="otp" aria-describedby="basic-addon1">
                </div>
                

                <button type="submit" id="login" value="Submit" class="btn btn-primary mt-2 mb-5" style="margin-left:45%">Submit</button>
                <?php
                  if(isset($_SESSION['loginStatus2'])=='failed'){
                    print "<div class=\"alert alert-danger mx-5 \" role=\"alert\">
                              Invalid Credentials
                           </div>";  
                    $_SESSION['loginStatus2'] = null;
                  }

                  
                ?>
          </form>
      </div>

    <!--Footer-->
    <?php include '../Components/footer.php';?>  

</body>
</html>


