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
      alert("OTP will be sent to your Email ID. Please have some patience.")
      return false
    }

    document.forms["LoginForm"].action="../Backend/sendOTP.php"
    
  }

</script>
<body>

    <!--Header-->
    <?php include '../Components/header.php'?>

      <?php echo isset($_SESSION['email']); ?>

      <!--Login-->
      <div class="card col-5 mx-5 my-5">
        <h5 class="card-title">Request OTP</h5>
          <!--Form-->
          <form name="LoginForm" method="POST" onsubmit="return sendOTP()">
              
                <div class="input-group mt-5 mb-3 mb-2 mx-5" style="width: 80%;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" name="email" class="form-control" placeholder="Email ID" aria-label="email" aria-describedby="basic-addon1">
                  
                </div>
                <button type="submit" id="requestOTP" value="Submit" class="btn btn-primary ml-5 my-2">Request OTP</button>
          </form>
      </div>

    <!--Footer-->
    <?php include '../Components/footer.php';?>  

</body>
</html>


