function validerForm(){
	var retour = false;
	var com=document.getElementsById("id_com").value;
	var note=document.getElementsById("id_note").value;
	


	if (note < 0 || note > 20) {
		document.getElementById("valid_note").innerHTML = "La note du produit n'est pas valide";

		if (com.length == ''){
			document.getElementById("valid_com").innerHTML = "Le com n'est pas valide";
		}

	}

	else{
		retour=true;
	}
	return retour;
}

