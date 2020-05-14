<?php
    function is_connected()
    {
        $connected = @fsockopen("www.google.com", 80); 
                                            //website, port  (try 80 or 443)
        if ($connected){
            $is_conn = "connected"; //action when connected
            fclose($connected);
            return true;
        }else{
            $is_conn = "disconnected"; //action in connection failure
            return false;
        }
        //echo $is_conn;

    }

    is_connected();

?>  