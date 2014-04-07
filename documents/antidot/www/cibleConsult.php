<!--
*********************************************
**               _   _     _       _       **
**    __ _ _ __ | |_(_) __| | ___ | |_     **
**   / _` | '_ \| __| |/ _` |/ _ \| __|	   **
**  | (_| | | | | |_| | (_| | (_) | |_     **
**   \__,_|_| |_|\__|_|\__,_|\___/ \__|    **
**                                         **
*********************************************
-->
<?php
//déclaration des variabes
if (get_magic_quotes_gpc()){//pour éviter les insertions de scripts, nous pouvons protéger nos variables $_POST
//stripslashes = supprime les antislashs d'une chaîne.
	$nomDemandeur		= stripslashes(trim($_POST['nom']));
	$emailDemandeur		= stripslashes(trim($_POST['email']));
	$nomMachine		= stripslashes(trim($_POST['nomMachine']));
	$emailAdmin		= stripslashes(trim($_POST['emailAdmin']));
	$machine		= stripslashes(trim($_POST['machine']));
	$distribution		= stripslashes(trim($_POST['distribution']));
	$versionDebian		= stripslashes(trim($_POST['versionD']));
	$versionRHEL		= stripslashes(trim($_POST['versionR']));
	$versionType		= stripslashes(trim($_POST['typeVersion']));
	$branch			= stripslashes(trim($_POST['branch']));
	$commentaire		= stripslashes(trim($_POST['commentaires']));
	$espaceDisque		= stripslashes(trim($_POST['espace']));
	$raid			= stripslashes(trim($_POST['raid']));
	$processeur		= stripslashes(trim($_POST['processeur']));
	$coeur			= stripslashes(trim($_POST['coeur']));
	$ram			= stripslashes(trim($_POST['ram']));
	$ip			= stripslashes(trim($_POST['ip']));
	$acces			= stripslashes(trim($_POST['acces']));
} 
else{//trim enleve les espaces (début et fin)
	$nomDemandeur		= trim($_POST['nom']);
	$emailDemandeur		= trim($_POST['email']);
	$nomMachine		= trim($_POST['nomMachine']);
	$emailAdmin		= trim($_POST['emailAdmin']);
	$machine		= trim($_POST['machine']);
	$distribution		= trim($_POST['distribution']);
	$versionDebian		= trim($_POST['versionD']);
	$versionRHEL		= trim($_POST['versionR']);
	$versionType		= trim($_POST['typeVersion']);
	$branch			= trim($_POST['branch']);
	$commentaire		= trim($_POST['commentaires']);
	$espaceDisque		= trim($_POST['espace']);
	$raid			= trim($_POST['raid']);
	$processeur		= trim($_POST['processeur']);
	$coeur			= trim($_POST['coeur']);
	$ram			= trim($_POST['ram']);
	$ip			= trim($_POST['ip']);
	$acces			= trim($_POST['acces']);
}
//recupération et vérification de la version de la distribution
if($distribution == "Debian"){//si distribution est debian alors je prend versionD
	$versionDistribution	= $versionDebian; 
}else{//sinon (c'est RHEL) alors je prend versionR
	$versionDistribution	= $versionRHEL;
}
//la date du jour avec l'heure
$date				= date('l j F Y, H:i'); // ex : Thursday 11 October 2012, 15:35
$dateRequete			= date('Y-m-d'); // ex : 2014-02-12
//recupération de l'adresse ip de la personne qui fait la demande
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	$ipVisiteur = $_SERVER['HTTP_CLIENT_IP'];
}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	$ipVisiteur = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
	$ipVisiteur = $_SERVER['REMOTE_ADDR'];
}
//les types selectionné
$tousTypes			='';
if(isset($_POST['type']) && !empty($_POST['type'])){
	foreach($_POST['type'] as $type){
		$tousTypes.=$type.' ';
	}	
}
// calcul de la longueur de la chaine
$longueurType			= strlen($tousTypes);
// écriture de la chaine avec suppression du dernier ' '
$typesOK			= substr($tousTypes,0, $longueurType-1);
//fin les types
//création du nom du fichier de conf
$nomFichier			= $nomDemandeur.'_'.$nomMachine;
//spécification de l'emplacement du fichier
$emplacementCible		= "conf/";
//extension du fichier
$extension			= ".conf";
//nom du fichier avec le chemin et l'extension
$fichierOk			= $emplacementCible.$nomFichier.$extension;
//moyen d'éviter d'écrire plusieurs fois dans le même fichier de conf
//s'il n'existe pas encore (je peux donc pas le lire)
if(!fopen($fichierOk,'r')){
	//on  crée le fichier
	$fichier		= fopen($fichierOk, 'a');
}
else{
	//je le supprime
	unlink ($fichierOk);
	//création du nouveau fichier maintenant qu'il n'existe plus
	$fichier		= fopen($fichierOk, 'a');
}
//on fera ici nos opérations sur le fichier...
//création du contenu du fichier de conf avec toutes les informations du formulaire
$contenuConf			= 
"# Needed for Installation
ADMIN_EMAIL=\"$emailAdmin\"
CLIENT_CONSOLE=\"console=ttyS1,57600n8|115200n8\"
CLIENT_DISTRIB=\"$distribution\"
CLIENT_DISTRIB_VERSION=\"$versionDistribution\"

# Installation Part
CLIENT_INSTALL_IP=
CLIENT_INSTALL_NETMASK=255.255.0.0
CLIENT_INSTALL_NETWORK=10.10.0.0
CLIENT_INSTALL_GATEWAY=10.10.1.255
RAID=\"$raid\"

# Final information
CLIENT_IP=$ip
CLIENT_MAC=
CLIENT_NAME=$nomMachine
CLIENT_NETMASK=255.255.0.0
CLIENT_NETWORK=10.10.0.0
CLIENT_GATEWAY=10.10.1.254

# Select the server type
# NOTE: the type could include multiple function (Ex: TYPE='AFS AIF ABO AUM ACS INFRA FLUID LXC MINIPROD_DLV MINIPROD_FLUID MEDIUMTEST WEB')
TYPE=\"$typesOK\"

# Product Info (In case type inclut AFS/AIF/ABO/ACS but not use when FLUID is set)
AS_VER=\"$versionType\"
AS_BRANCH=\"$branch\"

#specific disk configuration
#GPT = use gpt disk label for disk larger then 2TB
#LXC_HOST = config for server that will host lxc container
#LXC_HOST_MINIPROD_DLV = config for server that will host lxc container with miniprod
#DISK_SPECIFIC='GPT|LXC_HOST|LXC_HOST_MINIPROD_DLV'

#################################################
# Produced by the request-interface machine
# $date
#################################################
#              ---- Applicant ----
# Name : $nomDemandeur
# Mail : $emailDemandeur
# IP   : $ipVisiteur
#################################################";
//écriture sur le fichier
fputs($fichier,$contenuConf);
//quand on a fini de l'utiliser, on ferme le fichier
fclose($fichier);
?>
<!-- ENVOI DE L'EMAIL -->
<?php
// To email de l'admin
$to = $emailAdmin;
// Subject
$subject = 'Demande d\'une nouvelle machine';
// clé aléatoire de limite
$boundary = md5(uniqid(microtime(), TRUE));
// Headers
$headers = 'From: '.$nomDemandeur.' <'.$emailDemandeur.'>'."\r\n";
$headers .= 'Mime-Version: 1.0'."\r\n";
$headers .= 'Content-Type: multipart/mixed;boundary='.$boundary."\r\n";
$headers .= "\r\n";
// Message
$msg = 'Problème : Votre boite email ne supporte pas le HTML, merci de changer de boite de reception pour pouvoir afficher le contenu de la demande.'."\r\n\r\n";
$msg .= '--'.$boundary."\r\n";
// Message HTML
$msg .= 'Content-type: text/html; charset=utf-8'."\r\n\r\n";
$msg .= "
		<html>
			<head><h2><u>Nouvelle demande de machine</u></h2></head>
			<body>";//début du corps du message
$msg .="		<p><u>Bonjour</u>,</p>
				<p>Il me faudrait une machine <b>$machine</b> <b>$distribution</b> <b>$versionDistribution</b>";//début message avec le type de machine, distribution et la verison de la distribution
if($nomMachine){
	$msg .="		<br /><u>Nom</u> : <b>$nomMachine</b></p>";
}
if($typesOK){
	$msg .="	<p><u>Installé</u> : <b>$typesOK</b> ";	
	if($versionType){
		$msg .=" en <b>$versionType</b> ";
	}
	if($branch){
		$msg .="<b>$branch</b>.<p>";
	}
}
if($processeur || $ram || $espaceDisque || $machine=="physique" || $ip || $acces!="false"){
	$msg .="	<p><h3>_____________________</h3>";
	$msg .="		<p><h3><u>Informations Expert :</u></h3>";//on commence le paragraphe avec les caractéristiques spécifiques
	if($processeur){//le nombre de processeurs souhaité
		if($processeur==1){//s'il y en a qu'un seul
			$msg .="<u>Processeur</u> : <b>$processeur</b> ";
		}else{//s'il y a en a plusieurs ajoute un 's'
			$msg .="<u>Processeurs</u> : <b>$processeur</b> ";
		}
		if($coeur){//le nombre de processeurs souhaité
			if($coeur==1){//s'il y en a qu'un seul
				$msg .="<br /><u>Coeur</u>  :<b>$coeur</b>";
			}else{//s'il y a en a plusieurs ajoute un 's'
				$msg .="<br /><u>Coeurs</u> : <b>$coeur</b>";
			}
		}
	}
	if($ram){//s'il y a une ram de spécifié
		$msg .="	<br /><u>Ram</u> : <b>$ram</b> Go";
	}
	if($espaceDisque){//s'il y a un espace disque minimum spécifié
		$msg .="	<br /><u>Disque</u> : <b>$espaceDisque</b> Go d'espace au minimum.";
	}
	if($machine=="physique"){//si la machine est physique affiche s'il veut ou non un raid dessus
		if($espaceDisque){//s'il y a un espace disque
			if($raid=="true"){
				$msg .=", avec un raid.";
			}
			else{
				$msg .=", sans raid.";		
			}
		}//s'il n'y a pas d'espace disque
		else{
			if($raid=="true"){
				$msg .="Avec raid.";
			}
			else{
				$msg .="Sans raid.";		
			}
		}
	}
	if($ip){//s'il y a une adresse ip spécifié
		$msg .="	<br /><u>IP</u> : <b>$ip</b>";
	}
	if($acces!="false"){//si l'accès extérieur est demandé
		if($ip){//s'il y a une adresse IP
			$msg .="	et il faut que je puisse y accéder de l'extérieur.";
		}
		else{//s'il n'y a pas d'adresse IP
			$msg .="	<br />Il faut que je puisse y accéder de l'extérieur.";
		}
	}
	$msg .="		</p>";//ferme le paragraphe des caractéristiques spécifiques
}
if($processeur || $ram || $espaceDisque || $machine=="physique" || $ip || $acces!="false"){
	$msg .="	<p><h3>_____________________</h3>";
}
if($commentaire!="Tapez ici vos commentaires" && $commentaire!=""){//si la personne a changé le message de commentaire donc a écrit quelque chose
	$msg .="	<p><h3><u>Commentaire :</u></h3>
				$commentaire</p>";
}
elseif($processeur || $ram || $espaceDisque || $machine=="physique" || $ip || $acces!="false"){
	$msg .="	<p><h3>Sans commentaire</h3></p>";
		
}
$msg .="	<p><h3>_____________________</h3>";
$msg .="	<p><h3><u>Demandeur :</u></h3>";
$msg .="		<p><b>$nomDemandeur</b> - <u>$emailDemandeur</u></p>";//nom et email de la personne qui a envoyé la demande
$msg .="		<p><i>Cet email a été généré automatiquement par le biais de l'interface de demande de nouvelle machine.</i></p>
			</body>
		</html>"."\r\n";//fin du corps de l'email et petit message qui dit que c'est un mesage automatique
// Pièce jointe (le fichier de conf)
$file_name = $fichierOk;
if (file_exists($file_name))
{
	$file_type		= filetype($file_name);
	$file_size		= filesize($file_name);
	$handle			= fopen($file_name, "r") or die("File ".$file_name."can t be open");
	$content		= fread($handle, $file_size);
	$content		= chunk_split(base64_encode($content));
	$f			= fclose($handle);
	$msg			.= "--".$boundary."\r\n";
	$msg			.= "Content-type:".$file_type.";name=".$file_name."\r\n";
	$msg			.= "Content-transfer-encoding:base64"."\r\n\r\n";
	$msg			.= $content."\r\n";
}
// Fin
$msg				.= "--".$boundary."\r\n";
if (!isset($_COOKIE['sent'])){//verification avec un cookie que le mail n'est pas envoyé plusieurs fois (avec un rafrechissement de page)
	// Function mail(), envoi de l'email
	if (mail($to, $subject, $msg, $headers)){
		/* On créé un cookie de courte durée (ici 60 secondes) pour éviter de 
		 * renvoyer un e-mail en rafraichissant la page */  
		setcookie('sent', '1', time() + 60);
		// Debut message si l'email a bien était envoyé
		echo ("<h1 class='center' >Votre modification a bien été prise en compte.</h1>
<p class='center' >Merci d'avoir utiliser l'interface de demande de machines</p>
<p class='center' >Le fichier de conf <strong>".$nomFichier.$extension."</strong> a était généré ! Vous pouvez le consulter dans le dossier : <a href='conf'>conf</a></p>");
		// Fin message si l'email a bien était envoyé
		// Enregistrement dans la base de données
		/* Enregistrement dans la base de données (OK) a utiliser si la page consulter est fonctionnelle
		include("parametre.php");
		// Debut du stockage dans la base de données
		if($commentaire=="Tapez ici vos commentaires"){// si le commentaire n'as pas était touché il est mis a null quand la base de donnée
			$commentaireRequete='NULL';
		}
		else{//s'il a bouger alors on recupère le commentaire
			$commentaireRequete=$commentaire;
		}
		//construction de la requete qui recupére le numéro de la dernière demande +1
		$queryNumero = ("select max(idDemande)+1 as id from demande");
		//on execute la requete
		$requeteNumero = mysql_query($queryNumero) or die('Recupération du numéro de la requete : '.$requeteNumero.'<br/>Erreur : '.mysql_error());
		$numero = mysql_fetch_array($requeteNumero);
		//construction de la requete qui rempli la demande
		$queryDemande= ("insert into demande values ('$numero[id]','$dateRequete','$nomDemandeur','$emailDemandeur','$emailAdmin','$nomMachine','$commentaireRequete','$espaceDisque','$raid','$ram','$processeur','$ip','$acces','$machine','$distribution','$versionDistribution','$branch','$versionType')");
		//on execute la requete
		$result1 = mysql_query($queryDemande) or die('Ajout d\'une demande : '.$queryDemande.'<br/>Erreur : '.mysql_error());
		//boucle s'il y a plusieurs installe
		foreach($_POST['type'] as $installe){
			//construction de la requete qui rempli
			$queryInstalle= ("insert into installe values ('$numero[id]','$installe')");
			//on execute la requete
			$result2 = mysql_query($queryInstalle)or die('Ajout de type d\'installations : '.$queryInstalle.'<br/>Erreur : '.mysql_error());
		}	
		//fin enregistrement dans la base de données
		*/
	}
	else{
		echo ("<h1 class='center' >Erreur lors de l'envoi de l'email !</h1>");
	}
}
/* Cas où le cookie est créé est qu'il est donc impossible d'envoyer un nouvel email */
else{
		echo ("<h1 class='center' >Vous ne pouvez pas encore faire de nouvelle demande !</h1><p class='center' >Vous pouvez envoyer une nouvelle demande toutes les minutes au minimum.</p><p>Merci de refaire une demande ultérieurement.");
}
?>
<!-- FIN ENVOI DE L'EMAIL -->
