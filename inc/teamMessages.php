<h2>Nachricht an Team <span><?php echo $_SESSION['team'];?></span> senden</h2>
<form class="form-box" id="newMessage">
    <input type="hidden" value="<?php echo $_SESSION['team'];?>">
    <input type="hidden" value="<?php echo $_SESSION['username'];?>">
    <input type="hidden" name="messageID" value="">
    <textarea name="text" placeholder="Meine Nachricht" id="newMsg"></textarea>
    <button type="submit">Nachricht absenden</button>
    
    <!-- //TODO wäre schön, wenn man auf den Abbrechen Button drückt und der Text wieder weg ist -->
    <!-- <button type="cancel">abbrechen</button> -->
</form>

<h2>Meine Team-Nachrichten</h2>
<?php
    $teamName = $_SESSION['team'];
    $sql = "SELECT `notes`.*, `employee`.`employee_firstname`, `employee`.`employee_lastname` FROM `notes` LEFT JOIN `employee` ON `notes`.`note_username` = `employee`.`employee_username` 
    WHERE notes.team_name = '$teamName'";
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
