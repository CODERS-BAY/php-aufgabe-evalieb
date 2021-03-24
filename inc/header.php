<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <!-- mein favicon logo -->
    <link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
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
            <?php if(isset($_SESSION['photo'])){?>

                    <li><a href="userProfil.php"><div class="userimage" style="background-image: url(<?php echo $_SESSION['photo']?>"></div></a></li>
                    <?php }
                    else { ?>
                    <li><a href="userProfil.php"><i class="fas fa-user-circle"></i></a></li>
                <?php
                    }
                }
                ?>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </header>

    <?php endif; ?>
