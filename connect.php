<?php

    $database= new mysqli("localhost","root","","scheduling");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>