<!--Démarrage des sessions et appelle des fonctions -->

<?php session_start();
include 'fonctions.php';
?>
<!DOCTYPE html>
<html lang = 'fr'>

<!-- Fonction appelées ainsi que les links (bootstrap) -->

    <head>
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <title>Page de connexion</title>
    </head>

    <header>
    </header>

    <nav>
    </nav>

    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form id="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >

                <?php
                if(isset($_POST['username'])  && isset($_POST['password']) ){
                    if(compteExiste($_POST['username'],$_POST['password'])){
                        // MISE EN LOGS
                        // 1 : on ouvre le fichier
                        $monfichier = fopen('reussi.log', 'a+');
                        // 2 : on fera ici nos opérations sur le fichier...
                        fputs($monfichier, $_POST['username']." de ".$_SERVER['REMOTE_ADDR']." à ".date('ljS \of F Y h:i:s A'));
                        fputs($monfichier, "\n");
                        // 3 : quand on a fini de l'utiliser, on ferme le fichier
                        fclose($monfichier);
                        //echo 'OK';
                        $_SESSION['username']=$_POST['username'];
                        $_SESSION['password']=$_POST['password'];
                        $_SESSION['statut']=isAdmin($_POST['username']);
                        var_dump($_SESSION['username']);
                        var_dump($_SESSION['password']);
                        redirect('index.php',0);
                    }
                    else {
                        $monfichier = fopen('echoué.log', 'a+');
                        // 2 : on fera ici nos opérations sur le fichier...
                        fputs($monfichier, $_POST['username']." de ".$_SERVER['REMOTE_ADDR']." à ".date('ljS \of F Y h:i:s A'));
                        fputs($monfichier, "\n");
                        // 3 : quand on a fini de l'utiliser, on ferme le fichier
                        fclose($monfichier);
                        echo "<p>Erreur d'authentification</p>";
                    }
                }
                ?>
            </form>
        </div>
    </body>
</html>