<?php

session_start();  

require_once '../Database/Database.php';

if(isset($_POST['email'])){
    $_SESSION['email'] = $_POST['email'];
    //echo $_SESSION['email'];

    $collection = connectDB();

    $userCheck = verifyUser($_SESSION['email']);
    if($userCheck == null){
        //echo "User not found";
        createUser($_SESSION['email']);
        $_SESSION['user_info'] = fetchUser($_SESSION['email']);

        header('location: ../Pages/Register.php');

        return ;
    }
     
    if($userCheck != null){
        updateOTP($_SESSION['email']);
        $_SESSION['user_info'] = fetchUser($_SESSION['email']);

        if($userCheck['contact_no']!=''){
            header('location: ../Pages/Login.php');
        }else{
            header('location: ../Pages/Register.php');
        }

        return ;
    }
       
}

?>