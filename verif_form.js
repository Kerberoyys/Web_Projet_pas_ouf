function validerForm(){
	var retour = false;
	
	var produit = document.getElementById("id_nom").value;	
	
	var prix = document.getElementById("id_prix").value;
	
	var reg = /^[Nike ][a-zA-Z0-9 ]{2,}$/;


	if(reg.test(produit) == false) {
		document.getElementById("valid_nom").innerHTML = "Le nom du produit n'est pas valide";
		if (prix < 0) {
			document.getElementById("valid_prix").innerHTML = "Le prix du produit n'est pas valide";
		}
	}


	else{
		retour=true;
	}
	return retour;
}


