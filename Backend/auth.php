<?php

session_start();

require_once '../Database/Database.php';
require_once '../Database/connStatus.php';

    if(!is_connected()){
        header('location: logout.php');

        return ;
    }

$_SESSION['loginStatus'] = null;
$_SESSION['loginStatus3'] = null;

if(isset($_POST['email']) && isset($_POST['otp']) && isset($_POST['contact_no']) ){
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['otp'] = $_POST['otp'];
    $_SESSION['contact_no'] = $_POST['contact_no'];
    

    $verifyCredentials = verifyCredentials($_SESSION['email'],$_SESSION['otp']);
    if($verifyCredentials == null){
        echo "Invalid Credentials";
        $_SESSION['loginStatus'] = "failed";

        header('location: ../Pages/Register.php');
        
    }else{
        echo "UserFound";

        $_SESSION['user_info'] = $verifyCredentials;
        
        //var_dump($_SESSION['user_info']);
        //print_r($verifyCredentials['email']);

        updateVerificationStatus($_SESSION['email'],$_SESSION['contact_no']);
        
        header('location: ../Pages/Rules.php');

        return ;

    }

}

?>