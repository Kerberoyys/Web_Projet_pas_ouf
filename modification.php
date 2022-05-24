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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <title>Modification_Produit</title>
    </head>

    <header>
        <title>Modifier un avis</title>
    </header>

    <nav class="navbar navbar-expand-lg bg-light">
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

    <main class="container">
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Modifier un avis</h1>
                <p class="lead my-3">Page accessible uniquement en administrateur pour pouvoir modifier l'avis de votre choix</p>
                <?php
                echo '<p>Vous êtes connectés avec le compte ' . $_SESSION['username'] . '</p>';
                ?>
            </div>
        </div>

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
    </main>



    <footer>
        <p>Pied de la page <?php echo $_SERVER['PHP_SELF']; ?> </p>
        <a href="javascript:history.back()">Retour à la page précédente</a>
    </footer>

</html>