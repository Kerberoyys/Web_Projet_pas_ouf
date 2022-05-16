<?php


function compteExiste($mail, $pass)
{
    $retour = false;
    $madb = new PDO('sqlite:bdd/avisClientsProduits.sqlite');
    $mail = $madb->quote($mail);
    $pass = $madb->quote($pass);
    $requete = "SELECT login,password FROM comptes WHERE login = $mail AND password = $pass";
    //var_dump($requete);echo "<br/>";
    $resultat = $madb->query($requete);
    $tableau_assoc = $resultat->fetchAll(PDO::FETCH_ASSOC);
    if (sizeof($tableau_assoc) != 0) $retour = true;
    return $retour;
}

//*******************************************************************************************

function isAdmin($login)
{ // Retourne la valeur du statut. Changement de sujet!!!!!
    $retour = false;
    // A faire
    $madb = new PDO('sqlite:bdd/avisClientsProduits.sqlite');
    $login = $madb->quote($login);
    //SELECT Statut FROM utilisateurs WHERE Email = 'etu@etu.fr'
    $requete = "SELECT statut FROM comptes WHERE login = $login;";
    //var_dump($requete);echo "<br/>";
    $resultat = $madb->query($requete);
    if ($resultat) {
        $res = $resultat->fetch(PDO::FETCH_ASSOC);
        $retour = $res['statut'];
    }
    return $retour;
}

//*******************************************************************************************


function listeProd()
{

    $retour = false;
    $madb = new PDO('sqlite:bdd/avisClientsProduits.sqlite');
    $requete = "SELECT DISTINCT prixTTC,designation FROM produit;";
    $resultat = $madb->query($requete);
    if ($resultat) {
        $retour = $resultat->fetchAll(PDO::FETCH_ASSOC);
    }
    return $retour;
}

//*******************************************************************************************
function listeAvis()
{
    $retour = false;
    $madb = new PDO('sqlite:bdd/avisClientsProduits.sqlite');
    $requete = "SELECT prenom,designation as 'paire de chaussures',note,commentaire FROM avisclient INNER JOIN produit ON produit.idProduit = avisclient.idProduit INNER JOIN client on client.email = avisclient.email;";
    $resultat = $madb->query($requete);
    if ($resultat) {
        $retour = $resultat->fetchAll(PDO::FETCH_ASSOC);
    }
    return $retour;
}
//*******************************************************************************************

function listeProduitsParPrix($prix){
    $retour = false ;
    $madb = new PDO('sqlite:bdd/avisClientsProduits.sqlite');

    $requete = "SELECT designation as 'Modele de chaussure au prix de ".$prix." : ' FROM produit where prixTTC = $prix;";
    $resultat = $madb->query($requete);
    if($resultat){
        $retour = $resultat->fetchAll(PDO::FETCH_ASSOC);
    }


    return $retour;
}
//*******************************************************************************************




function afficheTableau($tab){
    echo '<table>';
    echo '<tr>';// les entetes des colonnes qu'on lit dans le premier tableau par exemple
    foreach($tab[0] as $colonne=>$valeur){		echo "<th>$colonne</th>";		}
    echo "</tr>\n";
    // le corps de la table
    foreach($tab as $ligne){
        echo '<tr>';
        foreach($ligne as $cellule)		{		echo "<td>$cellule</td>";		}
        echo "</tr>\n";
    }
    echo '</table>';
}

//*******************************************************************************************

function redirect($url,$tps)
{
$temps = $tps * 1000;

echo "
<script type=\"text/javascript\">\n"
            . "<!--\n"
            . "\n"
            . "function redirect() {\n"
            . "window.location='" . $url . "'\n"
            . "}\n"
            . "setTimeout('redirect()','" . $temps ."');\n"
            . "\n"
            . "// -->\n"
            . "

</script>\n";

}

?>