<?php 
$title = "Mitarbeiter hinzufügen";
include_once('inc/header.php');
include_once('inc/dbCon.php');?>
    <form id="addNewEmployee" class="form_box">
        <h2>Mitarbeiter Anlegen</h2>
        <label for="firstname">Vorname</label>
        <input type="text" name="firstname" placeholder="Vorname">
        <label for="lastname">Nachname</label>
        <input type="text" name="lastname" placeholder="Nachname">
        <label for="username">Username des Mitarbeiters</label>
        <input type="text" name="username" placeholder="Username">
        <label for="userpwd">Passwort</label>
        <input type="password" name="userpwd" placeholder="Password">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="@">
        <label for="rights">Rechte/Rolle</label>
        <select name="rights">
            <option value="employee">Mitarbeiter*in</option>
            <option value="lead">Teamleiter*in</option>
            <option value="admin">Admin</option>
        </select>
        <label for="team_name">Team</label>
        <select name="team_name">
            <option value="Ozean">Ozean</option>
            <option value="Rasberry">Himbeere</option>
            <option value="Steal">Stahl</option>
        </select>
        <button type="submit">anlegen</button>  
    </form>
<?php include_once('inc/footer.php');?>