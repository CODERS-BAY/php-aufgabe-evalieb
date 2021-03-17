<?php
    include_once('../inc/dbCon.php');
    $select = $dbcon->prepare("SELECT employee_ID, employee_username, employee_firstname, employee_lastname, employee_photo, employee_email,
                                    rights_name, team_name
                                    FROM employee
                                    WHERE employee_pwd = ? AND employee_ID = ?");

    $select->bind_param("si", $employee_pwd, $employee_ID);
    $employee_pwd = md5($_POST['employee_pwd']);
    $employee_ID = $_POST['employee_ID'];

    $select->execute();
    $result = $select->get_result();

    //wenn das Ergebnis unserer Select Befehls nicht leer ist, also das alte pwd zum user passt... 
    if($result->num_rows > 0){
        $sql = $dbcon->prepare("UPDATE `employee` SET `employee_pwd` = ? WHERE `employee`.`employee_ID` = ?");
        
        $sql ->bind_param("si", $new_pwd, $employee_ID);
        $new_pwd = md5($_POST['new_pwd']);

        if($sql->execute()){
            echo 'true'; //-> wird zu phpData in unserem Script
         }else{
             echo 'false';
         }
    }
    //wenn der MA nicht vorhanden oder das PW nicht korrekt ist...  -->
    else {
    echo "<h3>Passwort falsch</h3>";
    // echo $employee_username . " " . $employee_pwd . "<br>";
    }
    $select->close();
    $dbcon->close();
?>
