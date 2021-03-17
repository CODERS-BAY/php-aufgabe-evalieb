<?php 
if(is_uploaded_file($_FILES['userimage']['tmp_name'])){

    move_uploaded_file($_FILES['userimage']['tmp_name'], 'images/' . $_FILES['userimage']['name']);

    $filename = 'images/' . $_FILES['userimage']['name'];

    $employeeID = $_POST['employee_ID'];

    include_once('inc/dbCon.php');

    $sql = "UPDATE `employee` SET `employee_photo` = '$filename' WHERE `employee`.`employee_ID` = '$employeeID'";
    if($dbcon->query($sql)){
        echo 'true';    
        $_SESSION['photo'] = $filename;
    }
        else {
        echo 'false';
        }
        $dbcon->close();
        }
    else{
    echo 'false, kann foto nicht  laden';
    }
?>