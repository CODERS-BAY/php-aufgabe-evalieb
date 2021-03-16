<?php
include_once('../inc/dbCon.php'); //wenn noch nicht geöffnet

$employee_ID = $_POST['employee_id'];

$delete = "DELETE FROM `employee` WHERE `employee_ID` =" . $_POST['employee_id'] . ";";

    //Select statement ausführen
    if($dbcon->query($delete)){
        echo 'true'; //-> wird zu phpData in unserem Script
     }else{
         echo 'false';
     }
 
     // echo 'Mein phpfile hat gearbeitet';
     $dbcon->close();
 
 ?>