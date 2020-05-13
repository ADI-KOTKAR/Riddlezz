<?php

session_start();

require_once '../Database/Database.php';

$_SESSION['loginStatus'] = null;
$_SESSION['loginStatus3'] = null;

if(isset($_POST['email']) && isset($_POST['otp']) && isset($_POST['contact_no']) && isset($_POST['division'])){
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['otp'] = $_POST['otp'];
    $_SESSION['contact_no'] = $_POST['contact_no'];
    $_SESSION['division'] = $_POST['division'];
    

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

        updateVerificationStatus($_SESSION['email'],$_SESSION['contact_no'],(string)$_SESSION['division']);
        
        header('location: ../Pages/Rules.php');

        return ;

    }

}

?>