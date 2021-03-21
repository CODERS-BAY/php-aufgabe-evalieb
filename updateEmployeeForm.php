<?php 
$title = "Mitarbeiter bearbeiten";
include_once('inc/header.php');
include_once('inc/dbCon.php');?>
    <form id="alterEmployee" class="formular">
        <h2>Mitarbeiter bearbeiten</h2>
        <div class="row">
            <label for="firstname" class="col-6">Vorname</label>
            <input type="text" name="firstname" class="col-6" value="<?php echo $_POST['firstname']?>" required>
        </div>
        <div class="row">
            <label for="lastname" class="col-6" >Nachname</label>
            <input type="text" name="lastname" class="col-6" value="<?php echo $_POST['lastname']?>" required>
        </div>
        <div class="row">
            <label for="username" class="col-6">Username des Mitarbeiters</label>
            <input type="text" name="username" class="col-6" value="<?php echo $_POST['username'] ?>" required>
        </div>
        <!-- <div class="row">
            <label for="userpwd" class="col-6">Passwort</label>
            <input type="password" name="userpwd" class="col-6" value="<?php echo $_POST['employee_pwd']?>" required>
        </div> -->
        <div class="row">
            <label for="email" class="col-6">Email</label>
            <input type="email" name="email" class="col-6" value="<?php echo $_POST['employee_email']?>">
        </div>
        <div>            
            <fieldset for="rights" >
                <div class="row">
                    <legend class="col-6">Rechte/Rolle</legend>
                    <div class="col-6"></div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <input class="col-1" type="radio" name="rights" value="employee" <?php if($_POST['rights' ]=='employee')echo "checked" ?>>
                    <label class="col-5" for="employee">Mitarbeiter*in</label>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <input class="col-1" type="radio" name="rights" value="lead" <?php if($_POST['rights'] =='lead')echo "checked" ?>>
                    <label class="col-5" for="lead">Teamleiter*in</label>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <input class="col-1" type="radio" name="rights" value="admin" <?php if($_POST['rights'] =='admin')echo "checked"?>>
                    <label class="col-5" for="admin">Admin</label>
                </div>
            </fieldset>
        </div>
        <div>
            <fieldset for="team">
                <div class="row">
                    <legend class="col-6">Team</legend>
                    <div class="col-6"></div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <input class="col-1" type="radio" name="team" value="Horizon" <?php if($_POST['team'] =='Horizon')echo "checked" ?>>
                    <label class="col-5" for="Horizon">Team Horizon</label>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <input class="col-1" type="radio" name="team" value="Rasberry" <?php if($_POST['team'] =='Rasberry')echo "checked" ?>>
                    <label class="col-5" for="rasberry">Team Rasberry</label>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <input class="col-1" type="radio" name="team" value="Steal" <?php if($_POST['team'] =='Steal')echo "checked" ?>>
                    <label class="col-5" for="steal">Team Steal</label>
                </div>
            </fieldset>
            <input type="hidden" name="employee_id" value="<?php echo $_POST['employee_id']?>">
        </div>
        <div class="row">
            <button type="reset" class="col-5">zurücksetzten</button>
            <div class="col-1"></div>
            <button type="submit" class="col-5">ändern</button> 
        </div>
    </form>
<?php include_once('inc/footer.php');?>