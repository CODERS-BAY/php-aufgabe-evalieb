<div class="container">
    <table class="table">        
        <caption>Übersicht aller Mitarbeiter</caption>
        <thead> 
            <tr class="row">
                <th class="col-2">Username</th>
                <th class="col-2">Vorname</th>
                <th class="col-2">Nachname</th>
                <th class="col-2">Rolle</th>
                <th class="col-2">Team</th>
                <!-- bleibt leer für den löschen button -->
                <th class="col-2"> </th>
                <th class="col-2"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include('dbCon.php');
                //sql Statement in Variable speichern:
                $sql = "SELECT employee_ID, `employee_username`,`employee_firstname`,`employee_lastname`,`rights_name`,`team_name` FROM employee";

                $result = $dbcon->query($sql);
                // var_dump($result);

            while($datensatz = $result->fetch_assoc()){
                $username = $datensatz['employee_username'];?>
                <tr data-id="<?php echo $datensatz['employee_ID']; ?>" class="row noBreak">
                    <td class='col-2'><input class='inTD' name="username" value="<?php echo $username ?>" disabled></td>
                    <td class='col-2'><input class='inTD' name="firstname" value="<?php echo $datensatz['employee_firstname']; ?>" disabled></td>
                    <td class='col-2'><input class='inTD' name ="lastname" value="<?php echo $datensatz['employee_lastname']; ?>" disabled></td>
                    <td class='col-2'><input class='inTD' name="rights" value="<?php echo $datensatz['rights_name']; ?>" disabled></td>
                    <td class='col-2'><input class='inTD' name="team" value="<?php echo $datensatz['team_name']; ?>" disabled></td>
                    <?php if($_SESSION['rights'] == 'admin'){?>
                        <td class='col-2'><input type='submit' class='inTD delEmp' value='Löschen'> </td>
                        <td class='col-2'><input type='submit' class='inTD editEmp' value='Bearbeiten'> </td>
                    <?php } ?>
                </tr>
            <?php }
            //nach jeder Abfrage soll die Datenbankverbindung wieder geschlossen werden!
            $dbcon->close();
            ?> 
        </tbody> 
    </table> 
</div>