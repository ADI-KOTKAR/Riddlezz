<?php 


//Database Connection
function connectDB(){
    $client = new MongoDB\Client(
        'mongodb+srv://ADI-KOTKAR:base1234@cluster0-3xta0.mongodb.net/test?retryWrites=true&w=majority'
    );

    $db = $client->Riddlezz;
    $collection = $db->user_info;
    
    //echo "Connected Succesfully";
    return $collection;
}

?>