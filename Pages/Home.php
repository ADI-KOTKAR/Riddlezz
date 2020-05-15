<?php
    require_once '../Database/connStatus.php';

    if(!is_connected()){
      include '../Components/internetError.php';

      return ;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riddlezz_Home</title>
</head>
<!--Validation-->

<script>

  function sendOTP(){
    var emailCheck = document.forms["LoginForm"]["email"].value
    if(emailCheck == ""){
      alert("Please enter your Email ID")
      return false
    }

    alert("OTP will be sent to your Email ID. Please have some patience!")
    document.forms["LoginForm"].action="../Backend/sendOTP.php"
    
  }

</script>
<body style="background-image: url('../Images/puzzle.jpg');">

    <!--Header-->
    <?php include '../Components/header.php'?>

      <?php
          error_reporting(E_ERROR | E_WARNING | E_PARSE);
          
          session_start();

          if(isset($_SESSION['email'])){
              include '../Components/session.php';

              return ;
          }
      ?>
      <!--Login-->
      <div class="card col-4 mx-auto my-5 bg-light">
        <h2 class="card-title mx-auto mt-3">Request OTP</h2>
          <!--Form-->
          <form name="LoginForm" method="POST" onsubmit="return sendOTP()">
              
                <div class="input-group mt-5 mb-3 mb-2 mx-5" style="width: 80%;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input autocomplete="off" type="email" required name="email" class="form-control" placeholder="Email ID" aria-label="email" aria-describedby="basic-addon1">
                  
                </div>
                <button type="submit" id="requestOTP" value="Submit" class="btn btn-primary mt-2 mb-5" style="margin-left:40%">Request OTP</button>
          </form>
      </div>

    <!--Footer-->
    <?php include '../Components/footer.php';?>  

</body>
</html>


