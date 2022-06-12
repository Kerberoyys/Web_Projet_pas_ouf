
<?php



function afficheMenu(){
    ?>
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="index.php?action=liste_produits" title="Lister les produits">Lister les produits</a>
                <a class="nav-link" href="index.php?action=liste_produits_prix" title = "Lister les prix">Lister les produits par prix</a>
                <a class="nav-link" href="insertion.php?action=insérer_produit" title="Insérer un avis">Insérer un avis</a>


                <?php
                if($_SESSION['statut']=="administrateur"){
                    ?>
                    <a class="nav-link" href="modification.php?action=modifier_avis" title="Modifier un avis">Modifier un avis</a>

                    <?php
                }
                ?>
                <a class="nav-link" href="index.php?action=logout" title="Déconnexion">Se déconnecter</a>
            </div>
        </div>
    </div>



    <?php
}

//*******************************************************************************************


function afficheFormulaireProduitsParPrix(){
    echo "<br/>";
    // CNX BDD + REQUÊTE pour obtenir les prix correspondants à des produits
    $madb = new PDO('sqlite:bdd/avisClientsProduits.sqlite');
    $requete = "SELECT DISTINCT prixTTC,designation FROM produit group by prixTTC;";
    $resultat = $madb->query($requete);
    if($resultat){
        $produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <h1>Lister les produits par prix :</h1>
            <label for="id_prix">Prix :</label>
            <select id="id_prix" name="prix" size="1">
                <?php
                foreach($produits as $prod){
                    echo '<option value="'.$prod["prixTTC"].'">'.$prod["prixTTC"].'</option>';
                }
                ?>
            </select>
            <input type="submit" value="Rechercher des produits par prix"/>
        </fieldset>
    </form>
    <?php
    echo "<br/>";
}


//*******************************************************************************************

function afficheFormulaireAjoutAvis(){
    echo "<br/>";
    $madb = new PDO('sqlite:bdd/avisClientsProduits.sqlite');
    $compte = $madb->quote($_SESSION["username"]);
    $requete = 'select prenom from client inner join comptes on client.email = comptes.login where login ='.$compte.';';
    $resultat = $madb->query($requete);
    if($resultat) {
        $nom = $resultat->fetchAll(PDO::FETCH_ASSOC);
    }

    $madb = new PDO('sqlite:bdd/avisClientsProduits.sqlite');
    $requete = 'select designation from produit';
    $res = $madb->query($requete);
    if($res) {
        $chaussures = $res->fetchAll(PDO::FETCH_ASSOC);
    }
    
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validerForm()">
        <fieldset>
            <?php
            echo '<label for="id_prenom">Prénom :</label><input type="text" name="prenom" id="id_prenom" required size="20" value="'.$nom[0]["prenom"].'" disabled/><br/>';
            echo '<p id="valid_chaussure"></p>';

            ?>


            <label for="id_chaussures">Paire de chaussures :</label>
            <select id="id_chaussures" name="chaussure" size="1">
            <?php
            foreach($chaussures as $chaussure){
                echo '<option value="'.$chaussure["designation"].'">'.$chaussure["designation"].'</option>';
            }
            ?>

            </select>

            <p id="valid_chaussure"></p>


            <label for="id_ajoutnote">Note :</label><input type="number" name="note" step ="1" id="id_ajoutnote" required size="20" aria-valuemax="20" /><br />
            <p id="valid_ajoutnote" ></p>
            <label for="id_ajoutcom">Commentaire :</label><input type="text" name="com" id="id_ajoutcom" required size="20" /><br />
            <p id="valid_ajoutcom"></p>

            <input type="submit" value="Ajouter"/>
        </fieldset>
    </form>
    <?php
    echo "<br/>";
}


//*******************************************************************************************
function afficheFormulaireChoixModifAvis($prod){
    echo "<br/>";
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <label for="id_com">Commentaire :</label>
            <select id="id_com" name="com" >
                <?php
                foreach($prod as $com){
                    var_dump($com);
                    echo '<option value="'.$com['prenom'].'">'.$com["prenom"].'</option>';
                }
                ?>
            </select>
            <input type="submit" value="Rechercher commentaire"/>
        </fieldset>
    </form>
    <?php
    echo "<br/>";
}

//*******************************************************************************************
function afficheFormulaireModifAvis($choix_avi){
    echo "<br/>";
    if (!empty($choix_avi)) {

    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return FilterModif()">
        <fieldset>
            <label for="id_prenom">Prénom :</label><input type="text" name="prenom" id="id_prenom" required size="20"  value="<?php echo $choix_avi[0]['prenom']; ?>" readOnly/><br />
            <p id="valid_prenom"></p>
            <label for="id_chaussures">Paire de chaussures :</label><input type="text" name="chaussures" id="id_chaussures" required size="20" value="<?php echo $choix_avi[0]['paire de chaussures']; ?>" readOnly/><br />
            <p id="valid_chaussures"></p>
            <label for="id_note">Note :</label><input type="number" name="note" step ="1" id="id_note" required size="20" value="<?php echo $choix_avi[0]['note']; ?>"/><br />
            <p id="valid_note"></p>
            <label for="id_com">Commentaire : </label><input type="text" name="com" id="id_com" required size="20" value="<?php echo $choix_avi[0]['commentaire']; ?>" /><br />
            <p id="valid_com"></p>
            <label for="id_captcha">Captcha :</label>
            <input type="text" name="captcha"/>
            <img src="image.php" onclick="this.src='image.php?' + Math.random();" alt="captcha" style="cursor:pointer;">
            </br>
            <p id="valid_captcha"></p>

            <input type="submit" value="Modifier"/>
        </fieldset>
    </form>
    <?php
    }
    echo "<br/>";
}