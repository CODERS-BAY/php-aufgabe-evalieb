<?php
    include_once('../inc/dbCon.php');

    session_start();
    if(isset($_SESSION['team'])){

        $employeeID = $_POST['employee_id'];
        $team = $_SESSION['team'];

        $update = "UPDATE `employee` SET `team_name` = '$team' WHERE `employee`.`employee_ID` = '$employeeID'";



        if($dbcon->query($update)){
            echo 'true';
        }else {
            echo 'false';
        }
    }else {
        echo "Aktion nicht möglich!";
        }

    $dbcon->close(); 
    ?>


