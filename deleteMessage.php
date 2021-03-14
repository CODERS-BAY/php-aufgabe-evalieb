<?php
include_once('inc/dbCon.php'); //wenn noch nicht geöffnet

$messageID = $_POST['noteID'];

$delete = "DELETE FROM `notes` WHERE `notes`.`note_id` = '$messageID'"; 


    //Select statement ausführen
    if($dbcon->query($delete)){
        echo 'true'; //-> wird zu phpData in unserem Script
     }else{
         echo 'false';
     }
 
     // echo 'Mein phpfile hat gearbeitet';
     $dbcon->close();
 
 ?>

?>