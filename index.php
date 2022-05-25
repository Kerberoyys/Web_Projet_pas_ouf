<?php session_start(); ?>
<?php
include 'fonctions.php';
include 'formulaire.php';
?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <title>Index</title>
    <link rel="stylesheet" href="style1.css" media="screen" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <meta charset="utf-8">
</head>

<body>


<nav class="navbar navbar-expand-lg justify-content-between bg-light">
    <?php
    if (empty($_SESSION)) {
        redirect('connexion.php', 0);
    } else {
        afficheMenu();
    }

    if (!empty($_SESSION) && !empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'logout') {
        $_SESSION = array();
        session_destroy();
        redirect("index.php", 1);
    }

    ?>
</nav>

<main class="container">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">

        <div class="col-md-8 px-0">

            <h1 class="display-4 fst-italic">Bienvenue sur le site de vos chaussures préférées </h1>
            <p class="lead my-3">Page accessible uniquement a nos clients les plus fidèles vous pouvez voir les avis de
                vos chaussures nike préférées</p>
            <?php
            echo '<p>Vous êtes connectés avec le compte ' . $_SESSION['username'] . '</p>';
            ?>
        </div>
    </div>

    <article>
        <?php
        echo '<h1> Avis des clients :</h1>';
        $prod = listeAvis();
        if ($prod) afficheTableau($prod);
        ?>
    </article>

    <aside>

        <?php
        // Affichage du message accueil en fonction de la connexion
        if (empty($_SESSION))
            echo '<h1>Vous êtes déconnectés</h1>';

        // Route de traitement de la zone centrale de la page en fonction des liens GET du menu s'il y a une session
        if (!empty($_SESSION) && !empty($_GET) && isset($_GET["action"])) {
            switch ($_GET["action"]) {
                case "liste_produits":
                    echo '<h1>Liste des produits :</h1>';
                    $prod = listeProd();
                    if ($prod) afficheTableau($prod);
                    break;
                case "liste_produits_prix":
                    echo '<h1>Lister les produits par prix :</h1>';
                    afficheFormulaireProduitsParPrix();
                    break;
            }
        }

        if (!empty($_SESSION) && !empty($_POST) && isset($_POST['prix'])) {
            afficheFormulaireProduitsParPrix();
            $tab = listeProduitsParPrix($_POST['prix']);
            if ($tab) afficheTableau($tab);
        }
        ?>


    </aside>
    <section title="oko">
        <div class="card shadow-sm">
            <img src="image/nike_Impact.png" sizes="50%">
            <div class="card-body">
                <p class="card-text"> Nike</p>
            </div>
        </div>
        <img src="image/nike_Impact.png" sizes="50%">
        <p class="card-text">Nike Impact </p>
        <img src="image/nike_FlyEase.png" sizes="50%">
        <p class="card-text">Nike Impact </p>
        <img src="image/nike_Dawn.png" sizes="50%">
        <p class="card-text">Nike Impact </p>
        <img src="image/nike_Mercurial.png" sizes="50%">
        <p class="card-text">Nike Impact </p>
    </section>

</main>

<footer>
    <p>Pied de la page <?php echo $_SERVER['PHP_SELF']; ?></p>
    <a href="javascript:history.back()">Retour à la page précédente</a>
</footer>

</body>

</html>
