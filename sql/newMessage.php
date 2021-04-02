<?php 
    session_start();
    if(isset($_SESSION['employee_ID'])){ ?>

    <?php 
        include_once('../inc/dbCon.php');
        
        // falls die Nachricht NEU erstellt werden soll, bitte: 
        if($_POST['messageID'] == ''){
            $insert = $dbcon->prepare("INSERT INTO notes(note_text, employee_ID, team_name) VALUES (?,?,?)");
            $insert->bind_param("sis", $msgText, $employeeID, $team);

            $msgText = $_POST['text'];
            $employeeID = $_SESSION['employee_ID'];
            $team = $_SESSION['team'];

            if($insert->execute()){
                echo "true";
            }else{
                echo "false";
            }
            $insert->close();
        }
        else{
            // wenn die Nachricht schon vorhanden ist, und abgeändert wird...
            $update = 'UPDATE notes SET note_text = "' . $_POST['text'] .'" WHERE note_id = ' . $_POST['noteID'];
             if($dbcon->query($update)){
                 echo 'true';
             }else {
                 echo 'false';
             }
        }

        $dbcon->close(); 
        
    }?>
