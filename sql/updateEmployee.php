<?php 
    include_once('../inc/dbCon.php');

    $employeeID = $_POST['employee_id'];
    $employeeUsername = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    //das userpwd wird nur upgedatet wenn es neu gesetzt wurde
    if(isset($_POST['userpwd'])){
        $userpwd = ($_POST['userpwd']);
        $update = "UPDATE `employee` SET `employee_pwd` = MD5('$userpwd') WHERE `employee`.`employee_ID` = $employeeID";
        if($dbcon->query($update)){
           
        } else {
            echo 'passwort konnte nicht geändert werden';
        }
    }
    $email = $_POST['email'];
    $rights = $_POST['rights'];
    $team = $_POST['team'];


    $sql = "UPDATE `employee` SET `employee_username` = '$employeeUsername', `employee_firstname` = '$firstname', `employee_lastname` = '$lastname', `employee_email` = '$email', `rights_name` = '$rights', `team_name` = '$team' WHERE `employee`.`employee_ID` = $employeeID";
    
    if($dbcon->query($sql)){
        echo 'true';    
    }
    else {
    echo 'false';
    echo var_dump($sql);
    }
    $dbcon->close();

?>