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
    <title>Riddlezz_Endpage</title>
</head>
<body style="background-image: url('../Images/puzzle.jpg');">
    <!--Header-->
    <?php include '../Components/header.php'?>

    <?php
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        
        session_start();

            if(!isset($_SESSION['email'])){
                include '../Components/error.php';

                return ;
            }
    ?>

    <?php
        require_once '../Database/Database.php';

        error_reporting(E_ERROR | E_WARNING | E_PARSE);
    
        //fetch user_info
        ob_start();
        $user_info = fetchUser($_SESSION['email']);
        ob_end_clean();

        if( (int)$user_info['progress_count'] != 10){
            include '../Components/incomplete.php';

            return ;
        }

    ?>

    <!--Content-->
    <div class="card mx-auto mt-5 col-4">
        <div class="card-body ">
            <h1 class="text-center">Congratulations</h1>
            <ul class="list-group my-5 text-center ">
                <?php
                    $time_taken = $user_info['time_end'] - $user_info['time_start'];
                    $time =  getHoursMinutes($time_taken);

                    print"  <li class=\"list-group-item list-group-item-action bg-secondary text-white\"><b>Points: </b>".$user_info['points']."</li>
                            <li class=\"list-group-item list-group-item-action bg-secondary text-white\"><b>Incorrect Attempts: </b>".$user_info['incorrect_attempts']."</li>
                            <li class=\"list-group-item list-group-item-action bg-secondary text-white\"><b>Time taken: </b>".$time."</li>";
                ?>
            </ul>
            <a href="../Backend/logout.php" type="button" class="btn btn-dark" style="margin-left:35%">End Riddling</a>
        </div>
    </div>
    
    <!--Footer-->
    <?php include '../Components/footer.php'?>

</body>
</html>