<?php
$title = "Admin";
include_once('inc/header.php');
?>
<?php
if($_SESSION['rights'] == 'admin'){
    include_once('inc/employeesOverview.php');
include_once('inc/employeesEdit.php');
}
else{
    echo "<h3><a href='index.php'>Hier geht's zum Mitarbeiterbereich!</a></h3>";
}

?>



<?php
include_once('inc/footer.php');?>