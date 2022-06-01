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


function (ville)	{
	var req_AJAX = new XMLHttpRequest();// Objet qui sera crée

	if (window.XMLHttpRequest) 	{	// Mozilla, Safari
		req_AJAX= new XMLHttpRequest();

	}
	else {
		alert("EnvoiRequete: pas de XMLHTTP !");
	}

	if (req_AJAX) {
		req_AJAX.onreadystatechange = function() {
			TraiteListeFiltreUtilisateurs(req_AJAX);
		};
		req_AJAX.open("POST","listeUtilisateurs_GUESDON.php", true);
		req_AJAX.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req_AJAX.send("action="+ville);

	}
}

// fin fonction listeUtilisateurs()

function TraiteListeFiltreUtilisateurs(requete)	 {

	document.getElementById("tableau").innerHTML=requete.responseText;
}



