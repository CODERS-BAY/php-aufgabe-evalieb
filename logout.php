<?php 
$title = "AUSGELOGGT";
include_once('inc/header.php'); ?>

<?php 
    session_unset();
?>

<main>

    
    <h3>Du wurdest erfolgreich ausgeloggt.</h3>
    <h4>Hier kannst du dich wieder einloggen: <a href="index.php">LOGIN</a></h4>


</main>


<?php include_once('inc/footer.php'); ?>