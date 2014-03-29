<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Réalisations - Cours</title>
	<link href="style/styleP.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="menu">
		<div class="left">
			<a class="textnodeco" href="index.html">ACCUEIL</a>
		</div>
		<div class="right">
        	<a class="textnodeco active" href="cours.html">COURS</a>
           	<a class="textnodeco" href="ppe.html">PPE</a>
            <a class="textnodeco" href="stage1.html">STAGE1</a>
            <a class="textnodeco" href="stage2.html">STAGE2</a>
            <a class="textnodeco" href="perso.html">PERSO</a>
    	</div>
    </div>
	<h1>Me contacter</h1>
<!-- ENVOI DE L'EMAIL -->
<?php
//les variables
if (get_magic_quotes_gpc()){//pour éviter les insertions de scripts, nous pouvons protéger nos variables $_POST
	$sujet = stripslashes(trim($_POST['sujet']));
	$nomEnvoyeur = stripslashes(trim($_POST['nomEnvoyeur']));
	$emailEnvoyeur = stripslashes(trim($_POST['emailEnvoyeur']));
	$message = stripslashes(trim($_POST['message']));
}
else{//trim enleve les espaces (début et fin)
	$sujet = trim($_POST['sujet']);
	$nomEnvoyeur = trim($_POST['nomEnvoyeur']);
	$emailEnvoyeur = trim($_POST['emailEnvoyeur']);
	$message = trim($_POST['message']);
}
//recupération de l'adresse ip de la personne qui fait la demande
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	$ipVisiteur = $_SERVER['HTTP_CLIENT_IP'];
}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	$ipVisiteur = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
	$ipVisiteur = $_SERVER['REMOTE_ADDR'];
}
// To email de moi
$to = "nicolas.capiaumont@gmail.com";
// Subject
$subject = $sujet;
// clé aléatoire de limite
$boundary = md5(uniqid(microtime(), TRUE));
// Headers
$headers = 'From: '.$nomEnvoyeur.' <'.$emailEnvoyeur.'>'."\r\n";
$headers .= 'Mime-Version: 1.0'."\r\n";
$headers .= 'Content-Type: multipart/mixed;boundary='.$boundary."\r\n";
$headers .= "\r\n";
// Message
$msg = 'Problème : Votre boite email ne supporte pas le HTML, merci de changer de boite de reception pour pouvoir afficher le contenu de la demande.'."\r\n\r\n";
$msg .= '--'.$boundary."\r\n";
// Message HTML
$msg .= 'Content-type: text/html; charset=utf-8'."\r\n\r\n";
$msg .= $message."\r\n\r\n";
$mes .= 'IP : '.$ipVisiteur;//fin du corps de l'email 
if (!isset($_COOKIE['sent'])){//verification avec un cookie que le mail n'est pas envoyé plusieurs fois (avec un rafrechissement de page)
	// Function mail(), envoi de l'email
	if (mail($to, $subject, $msg, $headers)){
		/* On créé un cookie de courte durée (ici 120 secondes) pour éviter de 
		 * renvoyer un e-mail en rafraichissant la page */  
		setcookie('sent', '1', time() + 120);
		// Debut message si l'email a bien était envoyé
		echo ("<h1 class='good'>Votre email a bien était envoyé.</h1>
<h2>Merci de m'avoir envoyer un email, je vous répondrez dès que possible.</h2>");
	}
	else{
		echo ("<h1 class='erreur'>Erreur lors de l'envoi de l'email !</h1>");
	}
}
/* Cas où le cookie est créé est qu'il est donc impossible d'envoyer un nouvel email */
else{
		echo ("<h1 class='wait'>Vous ne pouvez pas encore envoyer l'email !</h1><h2>Vous pourrez envoyer un nouvel e-mail dans 2 minutes au minimum.</h2>");
}
?>
<!-- FIN ENVOI DE L'EMAIL -->
	<div class="espace"></div>
    <form id="formDemande" method="post" action="mail.php">
    <div class="row">
    	<div class="colonne-left">
        	<h2>Votre Nom<span class="textOrange">*</span></h2>
            <input class="inputTextDeco" name="nomEnvoyeur" type="text" placeholder="Nom" required>
            <h2>Sujet<span class="textOrange">*</span></h2>
            <input class="inputTextDeco" name="sujet" type="text" placeholder="Sujet" required>
        	<h2>Votre adresse e-mail<span class="textOrange">*</span></h2>
            <input class="inputTextDeco" name="emailEnvoyeur" type="email" placeholder="votre@adresse.com" required>
        </div> 
    <div class="colonne-right">
		<h2>Votre message<span class="textOrange">*</span></h2>
		<textarea class="textareaDeco" id="message" rows="3" name="message" onfocus="if (this.value=='Tapez votre message') this.value='';" onblur="if (this.value=='') this.value='Tapez votre message';" required>Tapez votre message</textarea>
		</div>
    </div>
    <div class="clear"></div>
	<div class="row center">
    	<input class="buttonDeco " type="submit" value="Envoyer">
    </div>
	</form>
    <div id="footer">
        <div class="row">
            <div id="textesFooter">
                <div id="textFooterNicolas">Nicolas Capiaumont</div>
                <div class="textFooterDroit">© 2014 Nicolas Capiaumont - Tous droits réservés - v1.0</div>
                <div class="textFooterDroit"><a class="textnodeco" href="legal.html">Mentions Legales</a></div>
            </div>
            <div id="reseaux">
                <ul>
                    <li><a class="textnodeco" id="facebook" href="https://www.facebook.com/nicolas.capiaumont" target="_blank"><img src="images/reseauxSociaux/facebook.png" alt="facebook"></a></li>
                    <li><a class="textnodeco" id="facebook" href="https://plus.google.com/u/0/+NicolasCapiaumont/" target="_blank"><img src="images/reseauxSociaux/googlePlus.png" alt="gogole plus"></a></li>
                    <li><a class="textnodeco" id="github" href="https://github.com/NCapiaumont" target="_blank"><img src="images/reseauxSociaux/github.png" alt="github"></a></li>
                    <li><a class="textnodeco" id="contact" href="contact.php"><img src="images/reseauxSociaux/mail.png" alt="contact"></a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>