function validerForm(){
	var retour = false;

	var com=document.getElementsByName("com").value;
	var note=document.getElementsByName("note").value;
	var reg = /^[a-zA-Z0-9 ]{2,}$/;



	if (note < "0" && note > "20") {
		document.getElementById("valid_note").innerHTML = "La note du produit n'est pas valide";
		}

	else{
		retour=true;
	}
	return retour;
}

