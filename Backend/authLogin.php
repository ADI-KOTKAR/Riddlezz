<?php

session_start();

require_once '../Database/Database.php';
require_once '../Database/connStatus.php';

    if(!is_connected()){
        header('location: logout.php');

        return ;
    }

$_SESSION['loginStatus2'] = null;
$_SESSION['loginStatus3'] = null;

if(isset($_POST['email']) && isset($_POST['otp'])){
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['otp'] = $_POST['otp'];
    
    $verifyCredentials = verifyCredentials($_SESSION['email'],$_SESSION['otp']);
    if($verifyCredentials == null){
        echo "Invalid Credentials";
        $_SESSION['loginStatus2'] = "failed";

        header('location: ../Pages/Login.php');
        
    }else{
        echo "UserFound";

        $_SESSION['user_info'] = $verifyCredentials;
        
        //var_dump($_SESSION['user_info']);
        //print_r($verifyCredentials['email']);

        if($_SESSION['user_info']['contact_no'] == ''){
            echo "Invalid Credentials";
            $_SESSION['loginStatus3'] = "failed";

            header('location: ../Pages/Register.php');

            return ;
        }
        
        $progress = (int)$_SESSION['user_info']['progress_count'];
        echo $progress;

        if($progress == 10){
            header("location: ../Pages/End.php");
        }else{
            header('location: ../Pages/Rules.php');
        }

        return ;

    }

}

?>