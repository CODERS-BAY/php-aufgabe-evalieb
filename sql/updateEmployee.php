<?php 
    include_once('../inc/dbCon.php');

    $employeeID = $_POST['employee_ID'];
    $employeeUsername = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    // userpwd wird bereits md5 verschlüsselt geschickt
    //aber was ist, wenn nicht?? also, wenn das PWD neu eingegeben wird?
    // $userpwd = $_POST['userpwd']; 
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