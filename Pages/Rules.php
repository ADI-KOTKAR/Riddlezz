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
    <title>Riddlezz_Rules</title>
</head>
<body>
    <!--Header-->
    <?php include '../Components/header.php'; ?>

    <?php
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        
        session_start();

            if(!isset($_SESSION['email'])){
                include '../Components/error.php';

                return ;
            }
    ?>

    <!--Content-->
    <div class="card mx-auto col-4 mt-5">
        <h1 class="card-title mx-auto mt-3">Rules</h1>
        <div class="card-body">
            <ul class="list-group mb-5">
                <li class="list-group-item list-group-item-primary text-center"><b>Total Riddles : 10</b></li>
                <li class="list-group-item list-group-item-info text-center"><b>All answers of Riddles consists of a "single word".</b></li>
                <li class="list-group-item list-group-item-secondary text-center"><b>Time taken for completion is considered.</b></li>
                <li class="list-group-item list-group-item-success text-center"><b>[+10] : Correct Answer</b></li>
                <li class="list-group-item list-group-item-danger text-center"><b>[-2] : Incorrect Attempt</b></li>
                <li class="list-group-item list-group-item-warning text-center"><b>Utitlize all of your knowledge and have fun!!</b></li>
            </ul>
            <a href="../Backend/timer.php" type="button" class="btn btn-dark" style="margin-left:42%">Start</a>
        </div>
    </div>

    <!--Footer-->
    <?php include "../Components/footer.php"; ?>
</body>
</html>