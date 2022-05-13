<!DOCTYPE html>
<html lang = 'fr'>

    <head>
        <?php
        include 'fonctions.php';
        ?>
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
                        //echo 'OK';
                        $_SESSION['username']=$_POST['username'];
                        $_SESSION['password']=$_POST['password'];
                        $_SESSION['statut']=isAdmin($_POST['username']);
                        redirect('index',0);
                    }
                    else {
                        echo "<p>Erreur d'authentification</p>";
                    }
                }
                ?>
            </form>
        </div>
    </body>




    <footer>
    </footer>
  
</html>