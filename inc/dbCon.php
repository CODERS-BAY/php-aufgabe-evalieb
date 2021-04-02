<?php
    
    $dbcon = new mysqli('localhost', 'root', '', 'mitarbeiter');

    if($dbcon->connect_error) { //connect_errno
        // echo 'Verbindung fehlgeschlagen ' . $dbcon->connect_error
        // exit();
        die('Connection failed ' . $dbcon->connect_error);
    }


?>