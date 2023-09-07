<?php
    $server = "localhost";
    $username = "root";
    $pass= "";
    $db_name="rtc_db";

    $conn = new mysqli($server, $username, $pass, $db_name);
    
    if($conn -> connect_error){
        echo "connection error";
    }
?>