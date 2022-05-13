<?php


    function compteExiste($mail,$pass){
        $retour = false ;
        $madb = new PDO('sqlite:bdd/avisClientsProduits.sqlite');
        $mail= $madb->quote($mail);
        $pass = $madb->quote($pass);
        $requete = "SELECT login,password FROM comptes WHERE login = $mail AND password = $pass" ;
        //var_dump($requete);echo "<br/>";
        $resultat = $madb->query($requete);
        $tableau_assoc = $resultat->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($tableau_assoc)!=0) $retour = true;
        return $retour;
    }


    function isAdmin($mail){ // Retourne la valeur du statut. Changement de sujet!!!!!
        $retour = false ;
        // A faire
        $madb = new PDO('sqlite:bdd/avisClientsProduits.sqlite');
        $mail= $madb->quote($mail);
        //SELECT Statut FROM utilisateurs WHERE Email = 'etu@etu.fr'
        $requete = "SELECT Statut FROM utilisateurs WHERE Email = $mail;";
        //var_dump($requete);echo "<br/>";
        $resultat = $madb->query($requete);
        if($resultat){
            $res = $resultat->fetch(PDO::FETCH_ASSOC);
            $retour = $res['Statut'];
        }
        return $retour;
    }


    function redirect($url,$tps)
    {
        $temps = $tps * 1000;

        echo "<script type=\"text/javascript\">\n"
            . "<!--\n"
            . "\n"
            . "function redirect() {\n"
            . "window.location='" . $url . "'\n"
            . "}\n"
            . "setTimeout('redirect()','" . $temps ."');\n"
            . "\n"
            . "// -->\n"
            . "</script>\n";

    }

?>