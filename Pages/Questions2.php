<?php
    require_once '../Database/connStatus.php';

    if(!is_connected()){
    include '../Components/internetError.php';

    return ;
    }
?>

<?php
    require_once '../Backend/auth.php';
    
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    
    //JSON Parsing
    $data = file_get_contents("../Database/Questions.json");
    $data = json_decode($data,true);

    //fetch user_info
    ob_start();
    $user_info = verifyCredentials($_SESSION['email'],$_SESSION['otp']);
    ob_end_clean();

    $_SESSION['progress_count'] = (int)$user_info['progress_count'];
    $_SESSION['points'] = (int)$user_info['points'];
    $_SESSION['attempts'] = (int)$user_info['incorrect_attempts'];

    if($_SESSION['progress_count'] == 0){
        $time_start = time();

        updateStartTime($_SESSION['email'],$time_start);
    }

    if($_SESSION['progress_count'] == 10){
        header('location: End.php');
    }
?>

<!--jquery-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


 <!--Handling Reloading of Page-->   
 <script>
    // $(function (){
    //     $(window).on('beforeunload',function(){
    //         return '';
    //     })
    // })
</script>

<script>


    function submitForm(){
        console.log("enetered")
        var answer = document.getElementById('answer').value

        if(answer == ''){
            alert("Please write your answer")
            return false
        }

        document.forms['questionForm'].action="../Backend/points.php"
    }

    function hintSelected(){

        setTimeout(() => {
            document.getElementById("hint").disabled = true
        }, 100);

        //alert("Points will be deducted if you choose for hint! ")  
        
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riddlezz_Questions</title>
</head>
<body style="background-image: url('../Images/puzzle.jpg');">
    <!--Header-->
    <?php include '../Components/header.php'?>

    <?php
        if(!isset($_SESSION['email'])){
            include '../Components/error.php';
    
            return ;
        }
    ?>

    <!--Content-->
    <div class="card mx-5">
        <div class="card-body row">
            <h4 class="col-4"><?php print $user_info['email']; ?></h4>
            <?php
                $current_question = (int)$user_info['progress_count'];
                $total_questions = (int)sizeof($data);

                $progress = round(($current_question/$total_questions)*100);
                $progress_percentage = $progress."%";

                print"<div class=\"progress col-6 my-auto bg-secondary\">
                            <div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: $progress_percentage;\" 
                                aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                ".$progress."%
                            </div>
                    </div>";
            ?>
            <a class="btn btn-dark ml-5 col-1" href="../Backend/logout.php" role="button">Logout</a>
        </div>
    </div>

    <!--Questions Content-->
    <?php 
    
        $count = $_SESSION['progress_count'];

        print "<form name=\"questionForm\" method=\"POST\" onsubmit=\"return submitForm()\">
                <div class=\"card mx-auto my-5 col-4 bg-light \">
                    <h2 class=\"card-title mx-auto mt-3 text-white-75\"> Riddle ".($count+1)." </h2>
                    <div class=\"card-body mx-3 text-center text-monospace\"><h5><b>
                        ".$data[$count]['question']."
                    </b></h5></div>
                    <div class=\"input-group mb-3 mx-auto w-75\">
                        <input type=\"text\" class=\"form-control text-center\" placeholder=\"Answer\" 
                               aria-label=\"Answer\" aria-describedby=\"basic-addon1\" autoComplete=\"off\"
                               id=\"answer\" name=\"answer\">
                    </div>";

                    if(isset($_SESSION['wrongAnswer'])){
                        print "<div class=\"alert alert-danger mx-auto w-75\" role=\"alert\">
                                    Invalid Answer! Please Try Again..
                               </div>";
                    }
                    
        print"           
                    <div class=\"mx-auto mb-5\">
                        <button type=\"submit\" class=\"btn btn-dark\" 
                                value=\"Submit\" id=\"submit\"> 
                            Submit
                        </button>
                    </div>
                </div>
             </form>";
        
    ?>
    
    <!--Footer-->
    <?php include "../Components/footer.php"; ?>
            
</body>
</html>
