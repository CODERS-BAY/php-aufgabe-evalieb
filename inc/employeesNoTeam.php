<?php 
    include('dbCon.php');
    //alle MA ohne Team!
    $team = "";
    //sql Statement in Variable speichern:
    $sql = "SELECT employee_ID, `employee_username`,`employee_firstname`,`employee_lastname`,`rights_name`,`team_name` 
    FROM employee  WHERE `team_name` = \"$team\""; 

    $result = $dbcon->query($sql);
    // var_dump($result);?>
    <table class="table">        
        <caption>Übersicht aller verfügbaren Mitarbeiter ohne Team</caption>
        <?php
        if($result->num_rows > 0) { ?>
            <thead> 
                <tr class="row">
                    <th class="col-2">Username</th>
                    <th class="col-2">Vorname</th>
                    <th class="col-2">Nachname</th>
                    <th class="col-2">Rolle</th>
                    <!-- bleibt leer für den zum Team hinzufügen- button -->
                    <th class="col-4"> </th>

                </tr>
            </thead>
            <tbody>
        <?php 
        while($datensatz=$result->fetch_object()){?>
            <form class="addEmployeeToTeam formular">
                <tr class='row noBreak'>
                    <td class='col-2'><input class='inTD' name='user_Name' value="<?php echo $datensatz->employee_username ?>" disabled></td>
                    <td class='col-2'><input class='inTD' value="<?php echo $datensatz->employee_firstname ?>" disabled></td>
                    <td class='col-2'><input class='inTD' value="<?php echo $datensatz->employee_lastname ?>" disabled></td>
                    <td class='col-2'><input class='inTD' value="<?php echo $datensatz->rights_name ?>" disabled></td>
                    <?php if($_SESSION['rights'] == 'lead'){?>
                    <td class='col-4'><input type='submit' class='inTD editBtn' value='zum Team <?php echo $_SESSION['team'];?> hinzufügen'></td>
                    <?php }
                         else if($_SESSION['rights'] == 'admin'){?>
                        <td class='col-2'><input type='submit' class='inTD' value='löschen'> </td>
                    <?php } ?>
                    <input name="employee_id" value="<?php echo $datensatz->employee_ID ?>" type="hidden">
                </tr>
            </form>
        <?php }
    }
    else { //wenn Datenbank leer
        echo "<h3>Zur Zeit sind keine freien Mitarbeiter verfügbar</h3>";
    }
    //nach jeder Abfrage soll die Datenbankverbindung wieder geschlossen werden!
    $dbcon->close();
    ?> 
    </tbody> 
    </table> 
