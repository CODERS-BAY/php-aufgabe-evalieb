<?php
    $title = "Interner Bereich";
    include_once('inc/header.php');
?>

<main>
<?php
    include_once('inc/dbCon.php');
    $select = $dbcon->prepare("SELECT employee_username, employee_firstname, employee_lastname, employee_photo, employee_email,
                                    rights_name, team_name
                                    FROM employee
                                    WHERE employee_pwd = ? AND employee_username = ?");

    $select->bind_param("ss", $employee_pwd, $employee_username);
    $employee_pwd = md5($_POST['employee_pwd']);
    $employee_username = $_POST['username'];

    $select->execute();
    $result = $select->get_result();

    //wenn das Ergebnis unserer Select Befehls nicht leer ist, die Daten in die Session speichern
    if($result->num_rows > 0){
        //MA einloggen
        while($row = $result->fetch_assoc()){
            $_SESSION['username'] = $row['employee_username'];
            $_SESSION['firstname'] = $row['employee_firstname'];
            $_SESSION['lastname'] = $row['employee_lastname'];
            $_SESSION['email'] = $row['employee_email'];
            $_SESSION['rights'] = $row['rights_name'];
            $_SESSION['team'] = $row['team_name'];

            //da das Foto kein Pflichtfeld ist, wird es extra abgefragt
            if($row['employee_photo']){
                $_SESSION['photo'] = $row['employee_photo'];
            }
        }

        // nachdem der User eingeloggt ist, kann er je nach "Rolle" in verschiedene Bereiche gelangen
        
        echo "<h2 class='welcome'> Hallo " . $_SESSION['firstname'] . "!</h2>";

        // <!-- wenn sich ein MA einloggt:  -->
        if($_SESSION['rights'] == 'employee'){
            echo "<h3>Du befindest Dich im Team " . $_SESSION['team'] . "</h3><a href='index.php'>Hier geht's zum Mitarbeiter Bereich</a>";
        }
        // <!-- wenn sich ein Teamleiter einloggt:  -->
        else if($_SESSION['rights'] == 'lead'){
            echo "<h3>Du bist Teamleiter von Team " . $_SESSION['team'] . "</h3><a href=''>Hier geht's zu Deinem Team</a>";
            echo "<a href=''>Hier geht's zu den freien Mitarbeitern</a>";
        }
        else if ($_SESSION['rights'] == 'admin'){
            echo "<h3>Du bist als <span>admin</span> eingeloggt! <a href='mitarbeiterVerwaltung.php'>Hier geht's zu Deiner Übersicht</a></h3>";?>
            <?php
        }
    }
    //wenn der MA nicht vorhanden oder das PW nicht korrekt ist...  -->
    else {
    echo "<h3>Passwort and/or Username wrong!</h3>";
    // echo $employee_username . " " . $employee_pwd . "<br>";
    }
        
        
    $select->close();
    $dbcon->close();
?>

</main>
