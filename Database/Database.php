<?php

require '../vendor/autoload.php';
require 'secret_key.php';  
require '../PHPMailer/index.php';

/*
            JSON Format for user:
                {
                    '_id' : '',
                    'email' : '',
                    'contact_no' : '',
                    'progress_count' : '',
                    'points' : '',
                    'incorrect_attempts' : '',
                    'hints_used' : '',
                    'time_start' : '',
                    'time_end' : '',
                    'otp' : '',
                    'verification' : ''
                }
        
*/

connectDB();

//Verify if user exists
function verifyUser($email){

    $collection = connectDB();
    $document = $collection->findOne(['email' => $email]);
    
    var_dump($document);

    return $document;
}

//Create new user
function createUser($email){
    $otp = generateOTP();

    $collection = connectDB();
    $document = $insertOneResult = $collection->insertOne([
        'email' => $email,
        'contact_no' => '',
        'progress_count' => 0,
        'points' => 0,
        'incorrect_attempts' => 0,
        'hints_used' => '',
        'time_start' => 0,
        'time_end' => 0,
        'otp' => (int)$otp,
        'verification' => 0
    ]);

    // $to_email = $email;
    // $subject = 'OTP for Riddlezz';
    // $message = 'Requested OTP: '.$otp.'. Enjoy solving funny Riddlezz';
    // $headers = 'From: noreply @ Riddlezz.com';
    // mail($to_email,$subject,$message,$headers);
    // echo "Mail sent";

    mailUser($email,$otp);

}

//To generate 4 digit OTP
function generateOTP(){
    $fourdigitrandom = rand(1000,9999); 
    return $fourdigitrandom; 
}

//Fetch user document
function fetchUser($email){
    $collection = connectDB();
    $document = $collection->findOne(['email' => $email]);

    var_dump($document);
    return $document;
}

//New OTP for registered Users
function updateOTP($email){
    $otp = generateOTP();

    $collection = connectDB();
    $updateResult = $collection->updateOne(
        ['email' => $email],
        ['$set' => ['otp' => $otp]]
    );

    // $to_email = $email;
    // $subject = '(Registered) OTP for Riddlezz';
    // $message = 'Requested OTP: '.$otp.". Have fun solving Riddles!";
    // $headers = 'From: noreply @ Riddlezz.com';
    // mail($to_email,$subject,$message,$headers);
    // echo "Mail sent";

    mailUserRegistered($email,$otp);

}


//Used for verifying credentials and returning user document
function verifyCredentials($email,$otp){
    $collection = connectDB();
    
    $document = $collection->findOne([
        'email' => $email,
        'otp' => (int)$otp
    ]);

    var_dump($document);
    return $document;
}

//Update Verification Status
function updateVerificationStatus($email,$contact_no){
    $collection = connectDB();

    $updateResult = $collection->updateOne(
        ['email' => $email],
        ['$set' => [
            'verification' => 1,
            'contact_no' => $contact_no,
            ]
        ]
    );
}

//Update start of Quiz
function updateStartTime($email,$time_start){
    $collection = connectDB();

    $updateResult = $collection->updateOne(
        ['email' => $email],
        ['$set' => ['time_start' => $time_start]]
    );
}


//Update Progress of user
function updateProgress($email,$progress_count,$points,$time){
    $collection = connectDB();

    $updateResult = $collection->updateOne(
        ['email' => $email],
        ['$set' => [
            'progress_count' => (int)$progress_count, 
            'points' => (int)$points, 
            'time_end' => $time
            ]
        ]
    );
}

//Update points for incorrect attempts
function updatePointsForAttempts($email,$attempts,$points){
    $collection = connectDB();

    $updateResult = $collection->updateOne(
        ['email' => $email],
        ['$set' => ['incorrect_attempts' => ( (int)$attempts+1 ), 'points' => ( (int)$points-2 )]]
    );
}

//Time conversion to format : "hh:mm:ss"
function getHoursMinutes($seconds, $format = '%02d:%02d:%02d') {

    if (empty($seconds) || ! is_numeric($seconds )) {
        return false;
    }

    $minutes = round($seconds / 60);
    $hours = floor($minutes / 60);
    $remainMinutes = ($minutes % 60);
    $remainSeconds = ($seconds % 60);

    return sprintf($format, $hours, $remainMinutes, $remainSeconds);

}

//Sorting users for Leaderboard
function sortLeaderboard(){
    $collection = connectDB();

    $cursor = $collection->aggregate([
        ['$addFields' => [
            'time_taken' => ['$subtract' => ['$time_end','$time_start'] ]
        ]],
        ['$sort' => [
            'points' => -1,
            'time_taken' => 1
        ]]
    ]);

    return $cursor;
}
?>