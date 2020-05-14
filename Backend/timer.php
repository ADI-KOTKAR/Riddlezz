<?php

    require_once '../Database/connStatus.php';

    if(!is_connected()){
        header('location: logout.php');

        return ;
    }

    session_start();

    header('location: ../Pages/Questions2.php');
?>