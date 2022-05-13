<?php session_start();?>
<?php 
    include 'fonctions.php';
?>
<!DOCTYPE html>
<html lang ='fr'>

    <head>
        <meta charset="utf-8">
        <title>Index</title>
    </head>

    <header>
    </header>

    <nav>

    </nav>
    
    <body>

        <?php
        if (empty($_SESSION) && empty($_SESSION["password"])){
            redirect('connexion.php',0);
        }
        else {
            echo '<p>Connecté</p>';
        }


        ?>

    </body>



    <footer>
    </footer>
  
</html>
