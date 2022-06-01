function validerForm(){
	var retour = false;
	
	var com = document.getElementById("id_com").value;
	
	var note = document.getElementById("id_note").value;
	
	var reg = /^[a-zA-Z0-9 ]{2,}$/;


	if(reg.test(com) == false) {
		document.getElementById("valid_com").innerHTML = "Le commentaire du produit n'est pas valide";
		if (note < 0 && note > 20) {
			document.getElementById("valid_note").innerHTML = "La note du produit n'est pas valide";
		}
	}


	else{
		retour=true;
	}
	return retour;
}

