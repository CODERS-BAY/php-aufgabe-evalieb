<?php 
$title = "Mein Team";
include_once('inc/header.php');?>

<div class="container">
    <table class="table">        
        <caption>Übersicht meiner Mitarbeiter</caption>
        <thead> 
            <tr class="row">
                <th class="col-2">Username</th>
                <th class="col-2">Vorname</th>
                <th class="col-2">Nachname</th>
                <th class="col-2">Rolle</th>
                <!-- bleibt leer für den aus Team entfernen- button -->
                <th class="col-4"> </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include('inc/dbCon.php');
                $team = $_SESSION['team'];
                //sql Statement in Variable speichern:
                $sql = "SELECT employee_ID, `employee_username`,`employee_firstname`,`employee_lastname`,`rights_name`,`team_name` 
                FROM employee WHERE team_name = \"$team\" AND rights_name = \"employee\" ";

                $result = $dbcon->query($sql);
                // var_dump($result);

            while($datensatz=$result->fetch_object()){
                $username = $datensatz->employee_username;?>

                <!-- <form class='formular deleteEmployee' onsubmit='return deleteForSure("<?php echo $username ?>")'> -->
                <form class="deleteFromTeam formular">
                    <tr class='row noBreak'>
                        <td class='col-2'><input class='inTD' name='user_Name' value="<?php echo $username ?>" disabled></td>
                        <td class='col-2'><input class='inTD' value="<?php echo $datensatz->employee_firstname ?>" disabled></td>
                        <td class='col-2'><input class='inTD' value="<?php echo $datensatz->employee_lastname ?>" disabled></td>
                        <td class='col-2'><input class='inTD' value="<?php echo $datensatz->rights_name ?>" disabled></td>
                        <!-- <td class='col-2'><input class='inTD' value="<?php echo $datensatz->team_name ?>" disabled></td> -->
                        <td class='col-4'><input type='submit' class='inTD editBtn' value='aus Team entfernen'> </td>
                        <input name="employee_id" value="<?php echo $datensatz->employee_ID ?>" type="hidden">
                    </tr>
                </form>
            <?php }
            //nach jeder Abfrage soll die Datenbankverbindung wieder geschlossen werden!
            $dbcon->close();
            ?> 
        </tbody> 
    </table> 
    <?php include_once('inc/employeesNoTeam.php');?>
</div>
<?php include_once('inc/footer.php') ?>