<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $title;?> </title>
</head>
<body>
<?php  
        session_start();

        $class = (isset($_SESSION['team_name'])) ? $_SESSION['team_name'] : '';

        /*
        $class = '';

        if(isset($_SESSION['team_name']))
            $class = $_SESSION['team_name'];            

        */
    ?>
    <!-- die Klasse bestimmt das Styling des Bodys...  -->
    <body class="<?php echo $class; ?>">

        <?php if(isset($_SESSION['username'])) : ?>

            <header>
                <ul>
                    <li><a href="index.php">Herzlich Willkomen</a></li>
                    <?php if($_SESSION['rights'] == 'admin' ) { ?>
                        <li><a href="usermanagement.php">Usermanagement</a></li>
                    <?php } 
                        if($_SESSION['rights'] == 'employee'){?>
                        <li><a href="userProfil.php">Mein Profil</a></li>
                    <?php
                        }
                    ?>

                </ul>
                <ul>
                    <li><?php echo $_SESSION['firstname'] ?></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </header>

        <?php endif; ?>