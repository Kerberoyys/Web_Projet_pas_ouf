<?php session_start();?>
<?php
    include 'fonctions.php';
    include 'formulaire.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="style1.css" rel="stylesheet" type="text/css" />
    <title>Insertion_produit</title>
</head>

    <header>
        <h1>Insertions de nouveaux produits nike.</h1>
    </header>

    <nav>
        <?php
        if(empty($_SESSION) || isset ($_SESSION["statut"]) && $_SESSION["statut"] !="administrateur") {
            echo "<p> Vous n'etes pas connecté ou pas admin</p>";
            redirect("index.php",1);
        }
        else {
            afficheMenu();
        }

        ?>
    </nav>


    <body>
    </body>


<footer>
    <p>Pied de la page <?php echo $_SERVER['PHP_SELF']; ?> </p>
    <a href="javascript:history.back()">Retour à la page précédente</a>
</footer>
</html>
