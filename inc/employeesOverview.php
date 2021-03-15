<div class="container">
    <table class="table">        
        <caption>Übersicht aller Mitarbeiter</caption>
        <thead> 
            <tr class="row">
                <th class="col-2">Username</th>
                <th class="col-2">Vorname</th>
                <th class="col-2">Nachname</th>
                <th class="col-1">Rolle</th>
                <th class="col-1">Team</th>
                <!-- bleibt leer für den löschen button -->
                <th class="col-2"> </th>
                <!-- bleibt leer für den ändern button -->
                <th class="col-2"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include('dbCon.php');
                //sql Statement in Variable speichern:
                $sql = "SELECT `employee_username`,`employee_firstname`,`employee_lastname`,`rights_name`,`team_name` FROM employee";

                $result = $dbcon->query($sql);
                // var_dump($result);

            while($datensatz=$result->fetch_object()){
                $username = $datensatz->employee_username;?>

                <form class='formular delete_employee' onsubmit='return deleteForSure("<?php echo $username ?>")'>
                    <tr class='row noBreak'>
                        <td class='col-2'><input class='inTD' name='userName' value=" <?php echo $username ?>" disabled> </td>
                        <td class='col-2'><?php echo $datensatz->employee_firstname ?></td>
                        <td class='col-2'><?php echo $datensatz->employee_lastname ?></td>
                        <td class='col-1'><?php echo $datensatz->rights_name ?></td>
                        <td class='col-1'><?php echo $datensatz->team_name ?></td>
                        <td class='col-2'><input type='submit' class='inTD' value='löschen'> </td>
                        <td class='col-2'><input type='edit' class='inTD' value='bearbeiten'></td>
                    </tr>
                </form>
            <?php }
            //nach jeder Abfrage soll die Datenbankverbindung wieder geschlossen werden!
            $dbcon->close();
            ?> 
        </tbody> 
    </table> 
</div>