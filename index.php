<?php 
$title = "Herzlich Willkommen";

include_once('inc/header.php'); ?>

<main>

<!--
    Wenn der User nicht angemeldet ist -> LOGIN 
    Wenn der User angemeldet ist -> sieht er seinen Teambereich inkl. Styling
-->
<?php
    // wenn der Username in der Session gesetzt ist, ist der User angemeldet
    if(isset($_SESSION['username'])){
        include_once('inc/dbCon.php');
        if($_SESSION['rights'] == 'employee') {
            // echo "<h3>Hallo " . $_SESSION['firstname'] . "!</h3>";
            include('inc/teamMessages.php');
        }
        else if ($_SESSION['rights'] == 'lead'){
            include('inc/teamMessages.php');
            // include('inc/teamMembers.php');

        }?>


<?php }
    else{ ?>
        <!-- wenn der User nicht angemeldet ist, kommt das login formular:  -->
        <!-- Login-Form -->
        <form method="post" action="login.php" class="form_box">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="employee_pwd" placeholder="Password">
            <button type="submit" value="einloggen">Einloggen</button>
        </form>
    <?php } ?>




<?php include_once('inc/footer.php'); ?>