<?php session_start(); ?>
<?php
include 'fonctions.php';
include 'formulaire.php';
?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <link rel="stylesheet" href="style1.css" media="screen" type="text/css" />
    <meta charset="utf-8">
    <title>Index</title>
</head>

<body>

<header>
    <h1>Retour des clients sur les produits nike.</h1>
</header>

<nav>
    <?php
    if (empty($_SESSION)) {
        redirect('connexion.php', 0);
    } else {
        afficheMenu();
    }

    if (!empty($_SESSION) && !empty($_GET) && isset($_GET['action'])  && $_GET['action']=='logout' ){
        $_SESSION=array();
        session_destroy();
        redirect("index.php",1);
    }

    ?>
</nav>

<article>
    <?php
    // Affichage du message accueil en fonction de la connexion
    if (empty($_SESSION))
        echo '<h1>Vous êtes déconnectés</h1>';
    else
        echo '<h1>Vous êtes connectés avec le compte ' . $_SESSION['username'] . '</h1>';

    // Route de traitement de la zone centrale de la page en fonction des liens GET du menu s'il y a une session
    if (!empty($_SESSION) && !empty($_GET) && isset($_GET["action"])) {
        switch ($_GET["action"]) {
            case "liste_produits":
                echo '<h1>Liste des produits</h1>';
                $prod = listeProd();
                if ($prod) afficheTableau($prod);
                break;
            case "liste_produits_prix":
                echo '<h1>Lister les produits par prix</h1>';
                afficheFormulaireProduitsParPrix();
                break;
        }
    }

    if (!empty($_SESSION) && !empty($_POST)  &&  isset($_POST['prix'])){
        afficheFormulaireProduitsParPrix();
        $tab=listeProduitsParPrix($_POST['prix']);
        if($tab) afficheTableau($tab);
    }
    ?>


</article>

<aside>
    <?php
    echo '<h1> Avis des clients :</h1>';
    $prod = listeAvis();
    if ($prod) afficheTableau($prod);
    ?>
</aside>


<footer>
    <p>Pied de la page <?php echo $_SERVER['PHP_SELF']; ?></p>
    <a href="javascript:history.back()">Retour à la page précédente</a>
</footer>

</body>

</html>
