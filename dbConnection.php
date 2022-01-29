<?php

    $serverName = "localhost";
    $userName = "root";
    $dbPassword = "";
    $dbName = "login";

    $connection = mysqli_connect($serverName, $userName, $dbPassword, $dbName);
    if(! $connection){
        echo "connection to ".$dbName ." failed!!!";
        exit();
    }
?>