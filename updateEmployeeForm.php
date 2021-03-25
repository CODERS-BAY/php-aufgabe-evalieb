<?php 
$title = "Mitarbeiter bearbeiten";
include_once('inc/header.php');
include_once('inc/dbCon.php');

$employeeID = $_POST['employee_id'];

// <!-- Daten aus der Datenbank mit select holen -->
$sql = "SELECT employee_ID, `employee_username`,`employee_firstname`,`employee_lastname`, `employee_email`, `rights_name`,`team_name` 
FROM employee WHERE employee_ID = $employeeID";

$result = $dbcon->query($sql);
// var_dump($result);

while($datensatz=$result->fetch_assoc()){
    $username = $datensatz['employee_username'];?>

        <form id="alterEmployee" class="formular">
            <h2>Mitarbeiter bearbeiten</h2>
            <div class="row">
                <label for="firstname" class="col-6">Vorname</label>
                <input type="text" name="firstname" class="col-6" value="<?php echo $datensatz['employee_firstname']?>" required>
            </div>
            <div class="row">
                <label for="lastname" class="col-6" >Nachname</label>
                <input type="text" name="lastname" class="col-6" value="<?php echo $datensatz['employee_lastname']?>" required>
            </div>
            <div class="row">
                <label for="username" class="col-6">Username des Mitarbeiters</label>
                <input type="text" name="username" class="col-6" value="<?php echo $datensatz['employee_username'] ?>" required>
            </div>
            <div class="row">
                <label for="userpwd" class="col-6">Passwort</label>
                <input type="password" name="userpwd" class="col-6">
            </div>
            <div class="row">
                <label for="email" class="col-6">Email</label>
                <input type="email" name="email" class="col-6" value="<?php echo $datensatz['employee_email']?>">
            </div>
            <div>            
                <fieldset for="rights" >
                    <div class="row">
                        <div class="col-7"></div>
                        <input class="col-1" type="radio" name="rights" id="employeeRights" value="employee" <?php if($datensatz['rights_name' ]=='employee')echo "checked" ?>>
                        <label class="col-4" for="employeeRights">Mitarbeiter*in</label>
                    </div>
                    <div class="row">
                        <legend class="col-6">Rechte/Rolle</legend>
                        <div class="col-1"></div>
                        <input class="col-1" type="radio" name="rights" id="leadRights" value="lead" <?php if($datensatz['rights_name'] =='lead')echo "checked" ?>>
                        <label class="col-4" for="leadRights">Teamleiter*in</label>
                    </div>
                    <div class="row">
                        <div class="col-7"></div>
                        <input class="col-1" type="radio" name="rights" id="adminRights" value="admin" <?php if($datensatz['rights_name'] =='admin')echo "checked"?>>
                        <label class="col-4" for="adminRights">Admin</label>
                    </div>
                </fieldset>
            </div>
            <div class="row"></div>
            <div>
                <fieldset for="team">
                    <div class="row">
                        <div class="col-7"></div>
                        <input class="col-1" type="radio" name="team" id="radioHorizon" value="Horizon" <?php if($datensatz['team_name'] =='Horizon')echo "checked" ?>>
                        <label class="col-4" for="radioHorizon">Team Horizon</label>
                    </div>
                    <div class="row">
                        <legend class="col-6">Team</legend>
                        <div class="col-1"></div>
                        <input class="col-1" type="radio" name="team" id="radioRaspberry" value="Raspberry" <?php if($datensatz['team_name'] =='Raspberry')echo "checked" ?>>
                        <label class="col-4" for="radioRaspberry">Team Raspberry</label>
                    </div>
                    <div class="row">
                        <div class="col-7"></div>
                        <input class="col-1" type="radio" name="team" id="radioSteal" value="Steal" <?php if($datensatz['team_name'] =='Steal')echo "checked" ?>>
                        <label class="col-4" for="radioSteal">Team Steal</label>
                    </div>
                    <div class="row">
                        <div class="col-7"></div>
                        <input class="col-1" type="radio" name="team" id="noTeam" value="" <?php if($datensatz['team_name'] =='')echo "checked" ?>>
                        <label class="col-4" for="noTeam">ohne Team</label>
                    </div>
                </fieldset>
                <input type="hidden" name="employee_id" value="<?php echo $datensatz['employee_ID']?>">
            </div>
            <div class="row">
                <button type="reset" class="col-5">zurücksetzten</button>
                <div class="col-2"></div>
                <button type="submit" class="col-5">ändern</button> 
            </div>
        </form>
    <?php     } ?>
<?php include_once('inc/footer.php');?>