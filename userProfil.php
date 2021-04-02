<?php
    $title = "Profil ändern";
    include_once('inc/header.php');
    ?>
<main>
    <div class="form_box">
        <form id="changePwd">
            <h2>Passwort ändern</h2>
            <input type="password" name="employee_pwd" placeholder="altes Password">
            <input type="hidden" name="employee_ID" value="<?php echo $_SESSION['employee_ID'] ?>">
            <input type="password" name="new_pwd" placeholder="neues Passwort">
            <input type="submit" value="Passwort ändern">
        </form>
    </div>




    <!-- Hier soll das User-Foto dann verändert werden.. -->
    <div class="form_box" >
        <form id="changeProfil" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
            <h2>Profilbild ändern</h2>
            <label for="userimage" >Profilbild</label>
            <input type="file" name="userimage">
            <input type="hidden" name="employee_ID" value="<?php echo $_SESSION['employee_ID'] ?>">
            <input type="submit" value="Profilbild ändern">
        </form>
    </div>

<?php 

if (isset($_FILES['userimage'])){
    if(is_uploaded_file($_FILES['userimage']['tmp_name'])){

        $filename = ""; 

        move_uploaded_file($_FILES['userimage']['tmp_name'], 'images/' . $_FILES['userimage']['name']);

        $filename = 'images/' . $_FILES['userimage']['name'];
        
        $employeeID = $_POST['employee_ID'];

        include_once("inc/dbCon.php");

        $sql = "UPDATE `employee` SET `employee_photo` = '$filename' WHERE `employee`.`employee_ID` = '$employeeID'";
        if($dbcon->query($sql)){
            //hier kann der Befehl im Browser ausgegeben werden
            // echo $update;
            $_SESSION['photo'] = $filename;
            $page = $_SERVER['PHP_SELF'];
            echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
        }else {
        echo '<h3> Bild nicht erfolgreich geladen</h3>';
        }
        $dbcon->close();
    }else{
        echo "<h3>Bild konnte nicht hochgeladen werden</h3>";
    }
}
include_once('inc/footer.php');?>
</main>