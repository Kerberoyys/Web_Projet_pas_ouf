function validerForm(){
	var retour = false;
	
	var produit = document.getElementById("id_nom").value;	
	
	var prix = document.getElementById("id_pass");
	

	
	if(produit=="1"){
		alert("Vous devez saisir un nom valide pour votre produit. ");
		
		
	}
	
	else{
		retour = true;
	}
	
	
	return retour;
}