<?php 
$title = "Admin-Bereich";
include('../inc/dbCon.php');
/*select -> zuerst mal fragen, ob der username vorhanden ist*/
$select = "SELECT * FROM employee WHERE employee_username ='" . $_POST['username'] . "'";

$result = $dbcon->query($select);

if($result->num_rows > 0){
    //dann ist der Username schon vergeben
    //json wandelt objekte und arrays in string um
    $array[0] = false;
    $array[1] = "Der Username ist schon vergeben";
    echo json_encode($array);
} else{
    /* Insert */
    $insert = $dbcon->prepare('INSERT INTO employee(employee_username, employee_firstname, employee_lastname, employee_email, employee_pwd, rights_name, team_name) VALUES (?,?,?,?,?,?,?)');
    
    $insert->bind_param("sssssss", $username, $firstname, $lastname, $email, $pwd, $rights, $team);
    
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pwd = md5($_POST['userpwd']);
    $rights = $_POST['rights'];
    $team = $_POST['team_name'];

    if($insert->execute()){
        $array[0] = true;
        $array[1] = "Der User wurde erfolgreich angelegt";
    }else{
        $array[0] = false;
        $array[1] = "Der User wurde nicht angelegt";
    }
    echo json_encode($array);
    $insert ->close();
}
$dbcon->close();
?>