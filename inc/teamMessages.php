<h2>Nachricht an Team <span><?php echo $_SESSION['team'];?></span> senden</h2>
<form class="form-box" id="newMessage">
    <input type="hidden" value="<?php echo $_SESSION['team'];?>">
    <input type="hidden" value="<?php echo $_SESSION['employee_ID'];?>">
    <input type="hidden" name="messageID" value="">
    <textarea name="text" placeholder="Meine Nachricht" id="newMsg"></textarea>
    <div class="row">
        <div class="col-1"></div>
        <button class="col-4" type="submit">Nachricht absenden</button>
        <div class="col-2"></div>
        <button class="col-4" type="reset">Inhalt leeren</button>
        <div class="col-1"></div>   	
    </div>
</form>

<h2>Meine Team-Nachrichten</h2>
<?php
    $teamName = $_SESSION['team'];
    $sql = "SELECT `notes`.*, `employee`.`employee_firstname`, `employee`.`employee_lastname` FROM `notes` LEFT JOIN `employee` ON `notes`.`employee_ID` = `employee`.`employee_ID` 
    WHERE employee.team_name = '$teamName'";
    $result = $dbcon->query($sql);

    // echo var_dump($result);

    if($result->num_rows > 0) {

        echo "<div id='notes'>";

        while($row = $result->fetch_assoc()){?>
            <div data-id="<?php echo $row['note_id']; ?>" class="note">
                <div class="note_headline"><?php echo $row['employee_firstname'] . " " . $row['employee_lastname']; ?></div>
                <div class="note_text"><?php echo $row['note_text']; ?></div>
                <!-- Eintrag darf nur vom Teamleiter  gelöscht werden -->
                <?php if($_SESSION['rights'] == 'lead'){?>
                    <div class="button delete">Löschen</div>
                <?php    } ?>
            </div>
        <?php }
        echo "</div>";
    }
    else{
        echo "<h3>Keine Teamnachrichten vorhanden</h3>";
    }
    $dbcon->close();
?>
