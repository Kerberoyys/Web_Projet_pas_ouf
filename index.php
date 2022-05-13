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
        var_dump($_SESSION);
        if (empty($_SESSION)){
            redirect('connexion.php',0);
        }

        else {
            echo "<p> ddd</p>";
        }

        ?>

    </body>



    <footer>
    </footer>
  
</html>
