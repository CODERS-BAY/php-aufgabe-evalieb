<?php 
$title = "Mitarbeiter hinzufügen";
include_once('inc/header.php');
include_once('inc/dbCon.php');?>
    <form id="addNewEmployee" class="formular">
        <h2>Mitarbeiter Anlegen</h2>
        <div class="row">
            <label for="firstname" class="col-6">Vorname</label>
            <input type="text" name="firstname" class="col-6" required>
        </div>
        <div class="row">
            <label for="lastname" class="col-6" >Nachname</label>
            <input type="text" name="lastname" class="col-6" required>
        </div>
        <div class="row">
            <label for="username" class="col-6">Username des Mitarbeiters</label>
            <input type="text" name="username" class="col-6" required>
        </div>
        <div class="row">
            <label for="userpwd" class="col-6">Passwort</label>
            <input type="password" name="userpwd" class="col-6" required>
        </div>
        <div class="row">
            <label for="email" class="col-6">Email</label>
            <input type="email" name="email" class="col-6">
        </div>
        <div class="row">
            <label for="rights"  class="col-6">Rechte/Rolle</label>
            <select name="rights"  class="col-6">
                <option value="employee">Mitarbeiter*in</option>
                <option value="lead">Teamleiter*in</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="row">
            <label for="team_name"  class="col-6">Team</label>
            <select name="team_name"  class="col-6">
                <option value="">keines</option>
                <option value="Horizon">Horizon</option>
                <option value="Raspberry">Raspberry</option>
                <option value="Steal">Steal</option>
            </select>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <button type="reset" class="col-5">Formular leeren</button>
            <div class="col-1"></div>
            <button type="submit" class="col-5">anlegen</button> 
        </div>
    </form>
<?php include_once('inc/footer.php');?>