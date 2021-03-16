<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/grid.css">

    <!-- font awesome  -->
    <link href="css/css/all.css" rel="stylesheet">
    <title><?php 
        if($title){
           echo $title;
        }else { echo "Mitgliederverwaltung";} ?> 
     </title>
</head>
<?php    
    $class= "";
    session_start();
    if(isset($_SESSION['team']))
        $class = $_SESSION['team'];  ?>   

<!-- die Klasse bestimmt das Styling des Bodys...  -->
<body class="<?php echo $class; ?>">
<?php  
    if(isset($_SESSION['username'])) :?> 

        <header>
            <ul>
                <li>Willkommen im Team <span><?php echo $class; ?></span>,
                <?php if($_SESSION['rights'] == 'lead' ){ echo "du bist Teamleiter, "; } 
                        echo $_SESSION['firstname'] ?>!</li>
                <?php if($_SESSION['rights'] == 'admin' ) { ?>
                    <li><a href="mitarbeiterVerwaltung.php">Mitarbeiterverwaltung</a></li>
                    <li><a href="newEmployeeForm.php">Neuen Mitarbeiter anlegen</a></li>
                    <?php } 
                else if($_SESSION['rights'] == 'lead' ) {?>
                    <li><a href="index.php">Nachrichten</a></li>
                    <li><a href="teamMembers.php">Mitarbeiter</a></li>
            </ul>
            <ul>
               <li><a href="userProfil.php"><i class="fas fa-user-circle"></i></a></li>

            <?php }?>
                <?php if($_SESSION['rights'] == 'employee') {?>
        
                    <li><a href="index.php">Nachrichten</a></li>
            </ul>
            <ul>
                    <li><a href="userProfil.php"><i class="fas fa-user-circle"></i></a></li>
                <?php
                    }
                ?>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </header>

    <?php endif; ?>
