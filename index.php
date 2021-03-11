<?php 
$title = "Herzlich Willkommen";

include_once('inc/header.php'); ?>

<main>

    <!--
        Wenn der User nicht angemeldet ist -> LOGIN 
        Wenn der User angemeldet ist -> sieht er seinen Teambereich inkl. Styling
    -->
    <!-- Login-Form -->
    <form method="post" action="login.php" class="form_box">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="employee_pwd" placeholder="Password">
        <input type="submit" value="einloggen">   
    </form>





<?php include_once('inc/footer.php'); ?>