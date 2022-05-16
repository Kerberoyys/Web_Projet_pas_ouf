<?php session_start();?>
<?php
include 'fonctions.php';
include 'formulaire.php';
?>
<!DOCTYPE html>
<html lang='fr'>

    <head>
        <meta charset="utf-8">
        <link href="style1.css" rel="stylesheet" type="text/css" />
        <title>Modification_Produit</title>
    </head>

    <header>
        <h1>Modifications des avis.</h1>
        <?php

        #Le choix de l’élément à modifier se fera à l’aide d’un formulaire dynamique. La vérification du
        #formulaire (modification) doit se faire au niveau du serveur avec une CAPTCHA (Option 4).


        #En réponse à ce choix vous afficherez un formulaire pré-rempli avec les données de l’élément à
        #modifier. L’envoi de ce formulaire (pré-rempli) pour valider les modifications se feraen rappelant la même page avec l’affichage des informations mises à jour (Option 6).

        #
        ?>

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

    <article>
        <?php
        echo '<h1>Modifier les avis :</h1>';
        ?>

    </article>


    <aside>
        <?php
        echo '<h1> Liste des avis:</h1>';
        $prod = listeAvis();
        if ($prod) afficheTableau($prod);
        ?>
    </aside>
    </body>



    <footer>
        <p>Pied de la page <?php echo $_SERVER['PHP_SELF']; ?> </p>
        <a href="javascript:history.back()">Retour à la page précédente</a>
    </footer>

</html>