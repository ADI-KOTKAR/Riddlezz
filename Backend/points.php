<?php
    require_once '../Database/Database.php';
    require_once 'auth.php';
    require_once 'authLogin.php';
    require_once '../Database/connStatus.php';

    if(!is_connected()){
        header('location: logout.php');

        return ;
    }

    //JSON Parsing
    $data = file_get_contents("../Database/Questions.json");
    $data = json_decode($data,true);

    $_SESSION['wrongAnswer'] = null;

    $question_no = (int)$_SESSION['progress_count'];

    if(isset($_POST['answer'])){

        //Collecting Strings
        $correct_answer = trim(strtoupper($data[$question_no]['answer']));
        $input = trim(strtoupper($_POST['answer']));


        //Regex Match
        if(preg_match('/'.$correct_answer.'/',$input)){
            //echo "Matched";
            $_SESSION['progress_count']++;
            $_SESSION['points'] += 10;

            $current_time = time();
            
            updateProgress($_SESSION['email'],$_SESSION['progress_count'],$_SESSION['points'],$current_time);
            header('location: timer.php');

        }else{
            echo "not matched";

            $_SESSION['wrongAnswer'] = "true";
            updatePointsForAttempts($_SESSION['email'],$_SESSION['attempts'],$_SESSION['points']);
            header('location: ../Pages/Questions2.php');
        }
    }
    
?>