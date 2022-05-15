
<?php


function afficheMenu(){
    // à compléter
    ?>
    <ul>
        <li><a href="index.php?action=liste_produits" title="Lister les produits">Lister les produits</a></li>
        <li><a href="index.php?action=liste_produits_prix" title="Lister les produits par prix">Lister les
                produits par prix</a></li>
    </ul>
    <ul>
    <?php
    if($_SESSION['statut']=="administrateur"){
        ?>
        <li><a href="insertion.php?action=inserer_produit" title="Insérer un utilisateur">Insérer un produit</a></li>
        <li><a href="update.php?action=modifier_produit" title="Modifier un utilisateur">Modifier un produit</a></li>
        <?php
    }
    ?>
        <p><a href="index.php?action=logout" title="Déconnexion">Se déconnecter</a></p>

    </ul>

    <?php
}

//*******************************************************************************************


function afficheFormulaireProduitsParPrix(){
    echo "<br/>";
    // CNX BDD + REQUETE pour obtenir les prix correspondantes à des produits
    $madb = new PDO('sqlite:bdd/avisClientsProduits.sqlite');
    // SELECT DISTINCT v.Insee, CP, Commune FROM villes v INNER JOIN utilisateurs u ON v.Insee = u.Insee;
    $requete = "SELECT DISTINCT prixTTC,designation FROM produit group by prixTTC;";
    $resultat = $madb->query($requete);
    if($resultat){
        $produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <label for="id_prix">Prix :</label>
            <select id="id_prix" name="prix" size="1">
                <?php
                foreach($produits as $prod){
                    echo '<option value="'.$prod["prixTTC"].'">'.$prod["prixTTC"].'</option>';
                }
                ?>
            </select>
            <input type="submit" value="Rechercher un produit par prix"/>
        </fieldset>
    </form>
    <?php
    echo "<br/>";
}




?>