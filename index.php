<!--Démarrage des sessions et appelle des fonctions -->

<?php session_start(); ?>
<?php
include 'fonctions.php';
include 'formulaire.php';
?>

<!-- Fonction appelées ainsi que les links (bootstrap) -->

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

<!-- Menu Principale affiché seulement si l'utilisateur est connecté -->

<nav class="navbar navbar-expand-lg justify-content-between bg-light">
    <?php
    if (empty($_SESSION)) {
        redirect('connexion.php', 0);
    } else {
        afficheMenu();
    }

//    Verification si l'utilisateur veut se déconnecter

    if (!empty($_SESSION) && !empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'logout') {
        $_SESSION = array();
        session_destroy();
        redirect("index.php", 0);
    }

    ?>
</nav>

<!-- Menu avec votre nom de connexion  -->

<main class="container">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">

        <div class="col-md-8 px-0">

            <h1 class="display-4 fst-italic">Bienvenue sur le site de vos chaussures préférées </h1>
            <p class="lead my-3">Page accessible uniquement a nos clients les plus fidèles vous pouvez voir les avis de
                vos chaussures nike préférées</p>
            <?php
            if (isset($_SESSION))
            echo '<p>Vous êtes connectés avec le compte ' . $_SESSION['username'] . '</p>';
            ?>
        </div>
    </div>

    <!-- Tableau avec les avis des clients  -->

    <article>
        <?php
        echo '<h2> Avis des clients :</h2>';
        $prod = listeAvis();
        if ($prod) afficheTableau($prod);
        ?>
    </article>

    <aside>


        <?php

        // Regarde si l'utilisateur est connecté sinon affiche un message d'erreur

        if (empty($_SESSION))
            echo '<h1>Vous êtes déconnectés</h1>';



        // Route de traitement de la zone centrale de la page en fonction des liens GET du menu s'il y a une session pour afficher la liste des produits

        if (!empty($_SESSION) && !empty($_GET) && isset($_GET["action"])) {
            switch ($_GET["action"]) {
                case "liste_produits":
                    echo '<h1>Liste des produits :</h1>';
                    $prod = listeProd();
                    if ($prod) afficheTableau($prod);
                    break;
                case "liste_produits_prix":
                    afficheFormulaireProduitsParPrix();
                    break;
            }
        }

        // Route de traitement de la zone centrale de la page en fonction des liens GET du menu s'il y a une session pour afficher le formulaire des produits


        if (!empty($_SESSION) && !empty($_POST) && isset($_POST['prix'])) {
            afficheFormulaireProduitsParPrix();
            $tab = listeProduitsParPrix($_POST['prix']);
            if ($tab) afficheTableau($tab);
        }
        ?>


    </aside>

    <section>

<!--   Affiche le top des chaussures en fonction des notes des avis du client -->

        <?php
        // Fonction qui permet de retourner les meilleures chaussures
        $res = topchaussure();
        ?>
        <h2>TOP 3 des meilleurs chaussures :</h2>
    <div class="album py-5">
        <div class="container">

<!--Affiche de l'image dans le top 3-->

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <?php
                        echo '<img src='.$res[0].' alt = "image 1">';

                        // Premiere image

                        echo '<div class="card-body">';
                            echo'<p class="card-text">TOP 1 : '.$res[1].'</p>';
                        echo'</div>'
                        ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <?php

                        // Deuxieme image

                        echo '<img src='.$res[2].' alt = "image 2">';

                        echo '<div class="card-body">';
                        echo'<p class="card-text">TOP 2 : '.$res[3].'</p>';
                        echo'</div>'
                        ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <?php

                        // Troisième image

                        echo '<img src='.$res[4].' alt = "image 3" >';

                        echo '<div class="card-body">';
                        echo'<p class="card-text">TOP 3 : '.$res[5].'</p>';
                        echo'</div>'
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


</main>

<!-- Affichage du footer -->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-8 my-4 border-top">
            <div class="col-md-4 align-items-center">
                <p>Pied de la page <?php echo $_SERVER['PHP_SELF']; ?></p>
                <a href="javascript:history.back()">Retour à la page précédente</a>

            </div>
        </footer>
    </div>

</body>

</html>
