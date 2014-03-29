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