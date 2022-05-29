
<?php


function afficheMenu(){
    ?>
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="index.php?action=liste_produits" title="Lister les produits">Lister les produits</a>
                <a class="nav-link" href="index.php?action=liste_produits_prix">Lister les produits par prix</a>


                <?php
                if($_SESSION['statut']=="administrateur"){
                    ?>
                    <a class="nav-link" href="insertion.php?action=insérer_produit" title="Insérer un produit">Insérer un produit</a>
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

function afficheFormulaireAjoutProd(){
		echo "<br/>";

	?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validerForm()">
		<fieldset>
			<label for="id_nom">Nom du produit :</label><input type="text" name="nom" id="id_nom" required size="20" /><br />
            <p id="valid_nom"></p>
			<label for="id_prix">Prix du produit :</label><input type="number" step ="0.01" name="prix" required id="id_prix" size="10" /><br />
            <p id="valid_prix"></p>
			<input type="submit" value="Insérer"/>
		</fieldset>
	</form>
    <?php
    echo "<br/>";
}