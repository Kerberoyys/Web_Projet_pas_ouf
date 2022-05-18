function validerForm(){
	var retour = false;
	
	var produit = document.getElementById("id_nom").value;	
	
	var prix = document.getElementById("id_pass").value;
	
	if (prix<0){
		alert("Vous devez saisir un prix valide pour votre produit. ");
	}
	else{
		retour = true;
	}
	switch(prix)
				{
					case "0":	
						alert("Vous devez saisir un nom valide pour votre produit. ");	
					break;
					case "2":	
						alert("Carré");
					break;
					default:
						retour = true;
				}
	return retour;
}