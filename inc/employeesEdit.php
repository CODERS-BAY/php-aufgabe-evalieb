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
                <!-- bleibt leer für den bearbeiten button -->
                <th class="col-2"> </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include('dbCon.php');
                //sql Statement in Variable speichern:
                $sql = "SELECT employee_ID, `employee_username`,`employee_firstname`,`employee_lastname`,`rights_name`,`team_name`,`employee_email`,employee_pwd FROM employee";

                $result = $dbcon->query($sql);
                // var_dump($result);

            while($datensatz=$result->fetch_object()){
                $username = $datensatz->employee_username;?>

                <!-- <form class='formular deleteEmployee' onsubmit='return deleteForSure("<?php echo $username ?>")'> -->
                <form class="updateEmployee formular" action="updateEmployeeForm.php" method="post">
                    <tr class='row noBreak'>
                        <td class='col-2'><input name="username"class='inTD'  value="<?php echo $username?>" ></td>
                        <td class='col-2'><input name="firstname" class='inTD' value="<?php echo $datensatz->employee_firstname ?>" ></td>
                        <td class='col-2'><input name ="lastname" class='inTD' value="<?php echo $datensatz->employee_lastname ?>" ></td>
                        <td class='col-2'><input name="rights" class='inTD' value="<?php echo $datensatz->rights_name ?>" ></td>
                        <td class='col-2'><input name="team" class='inTD' value="<?php echo $datensatz->team_name ?>" ></td>
                        <td class='col-2'><input type='submit' class='inTD' value='Bearbeiten'> </td>
                        <input name="employee_id" value="<?php echo $datensatz->employee_ID ?>" type="hidden">
                        <input name="employee_email" value="<?php echo $datensatz->employee_email ?>" type="hidden">
                        <input name="employee_pwd" value="<?php echo $datensatz->employee_pwd ?>" type="hidden">
                    </tr>
                </form>
            <?php }
            //nach jeder Abfrage soll die Datenbankverbindung wieder geschlossen werden!
            $dbcon->close();
            ?> 
        </tbody> 
    </table> 
</div>