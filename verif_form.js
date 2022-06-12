/*Fonction qui permet de verifier si les inputs correspondent bien au attendu */
function validerForm(){
	var retour = false;
	var com=document.getElementById("id_ajoutcom").value;
	var note=document.getElementById("id_ajoutnote").value;
	var reg1 = /^[a-zA-Z ]*$/;
	var reg2 = /^[ ]*$/;

	//Test si le commentaire a bien que des lettres et des espaces
	if(reg1.test(com) == false) {
		document.getElementById("valid_ajoutcom").innerHTML = "Le commentaire n'est pas valide, seules les lettres et les espaces sont autorisées.";
	}

	//Test si le commentaire n'a pas que des espaces
	if(reg2.test(com) == true) {
		document.getElementById("valid_ajoutcom").innerHTML = "Le commentaire n'est pas valide, il n'y a que des espaces";
	}

	//Test si le commentaire n'est pas vide
	if (com.length == ''){
		document.getElementById("valid_ajoutcom").innerHTML = "Le commentaire n'est pas valide";
	}

	//Test si la note est entre 0 et 20
	if (note < 0 || note > 20) {
		document.getElementById("valid_ajoutnote").innerHTML = "Votre note doit être entre 0 et 20";
		if (com.length == ''){
			document.getElementById("valid_ajoutcom").innerHTML = "Le commentaire n'est pas valide";
		}

	}
	//Retourne vrai si l'ensemble de données sont valides
	else{
		retour=true;
	}

	//retourne la valeur retour
	return retour;
}

