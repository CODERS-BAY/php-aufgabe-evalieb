<?php 
    session_start();
    if(isset($_SESSION['username'])){ ?>

    <?php 
        include_once('inc/dbCon.php');
        
        // falls die Nachricht NEU erstellt werden soll, bitte: 
        if($_POST['messageID'] == ''){
            $insert = $dbcon->prepare("INSERT INTO notes(note_text, note_username, team_name) VALUES (?,?,?)");
            $insert->bind_param("sss", $msgText, $username, $team);

            $msgText = $_POST['text'];
            $username = $_SESSION['username'];
            $team = $_SESSION['team'];

            if($insert->execute()){
                echo "true";
            }else{
                echo "false";
            }
            $insert->close();
        }else{
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
