function validerForm(){
	var retour = false;
	var com=document.getElementById("id_ajoutcom").value;
	var note=document.getElementById("id_ajoutnote").value;
	var reg1 = /^[a-zA-Z ]*$/;
	var reg2 = /^[ ]*$/;

	if(reg1.test(com) == false) {
		document.getElementById("valid_ajoutcom").innerHTML = "Le com n'est pas valide, seules les lettres et les espaces sont autorisées.";
	}
	if(reg2.test(com) == true) {
		document.getElementById("valid_ajoutcom").innerHTML = "Le com n'est pas valide, il n'y a que des espaces";
	}
	if (com.length == ''){
		document.getElementById("valid_ajoutcom").innerHTML = "Le com n'est pas valide";
	}
	if (note < 0 || note > 20) {
		document.getElementById("valid_ajoutnote").innerHTML = "Votre note doit être entre 0 et 20";
		if (com.length == ''){
			document.getElementById("valid_ajoutcom").innerHTML = "Le commentaire n'est pas valide";
		}

	}

	else{
		retour=true;
	}
	return retour;
}

