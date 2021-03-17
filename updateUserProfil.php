<?php
    include_once('inc/header.php');
    /*
    das Foto, dass der User hochläd soll in den img Ordner geladen werden!
    */

    if(is_uploaded_file($_FILES['userimage']['tmp_name'])){

        move_uploaded_file($_FILES['userimage']['tmp_name'], 'images/' . $_FILES['userimage']['name']);

        $filename = 'images/' . $_FILES['userimage']['name'];
        
        $employeeID = $_POST['employee_ID'];

        include_once('inc/dbCon.php');

        $sql = "UPDATE `employee` SET `employee_photo` = '$filename' WHERE `employee`.`employee_ID` = '$employeeID'";
        if($dbcon->query($sql)){
            echo '<h3>Bild wurde erfolgreich geladen</h3>';
            //hier kann der Befehl im Browser ausgegeben werden
            // echo $update;
            $_SESSION['photo'] = $filename;
        }else {
        echo '<h3> Bild nicht erfolgreich geladen</h3>';
        }
        $dbcon->close();
    }else{
        echo "<h3>Bild konnte nicht hochgeladen werden</h3>";
    }
include_once('inc/footer.php');
?>

