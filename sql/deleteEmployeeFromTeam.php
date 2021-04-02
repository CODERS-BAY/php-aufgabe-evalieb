<?php
    include_once('../inc/dbCon.php');

    $employeeID = $_POST['employee_id'];
    // $team = $_SESSION['team'];

    $update = "UPDATE `employee` SET `team_name` = '' WHERE `employee`.`employee_ID` = '$employeeID'";



    if($dbcon->query($update)){
        echo 'true';
    }else {
        echo 'false';
    }

    $dbcon->close(); 
    ?>