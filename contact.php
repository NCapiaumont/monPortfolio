<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Réalisations - Cours</title>
	<link href="style/styleP.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="favicon.ico">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	<script type="text/javascript">
		var menu = jQuery.noConflict();
		menu("document").ready(function(){
			menu(window).scroll(function () {
				if (menu(this).scrollTop() > 199) {
					menu('.nav-container').addClass("f-nav");
					menu(".contenu").addClass("f-head");
				} else {
					menu('.nav-container').removeClass("f-nav");
					menu(".contenu").removeClass("f-head");
				}
			});
		});
	</script>
</head>
<body class="contenu">
	<div class="header">
    	<div class="row">
        	<div class="colonne-left headPostionLogo">
            	<a href="index.html"><img src="images/logoBlanc.png" alt="logo"></a>
            </div>
            <div class="colonne-right headTextPosition">
            	<div class="headTitle">PortFolio</div>
                <div class="headName">Nicolas Capiaumont</div>
                <div class="headDescription">Développeur informatique</div>
            </div>
        </div>
	</div>
    <div class="nav-container">
        <div class="nav">
            <div class="left">
                <a class="textnodeco" href="index.html">ACCUEIL</a>
            </div>
            <div class="right">
                <a class="textnodeco" href="cours.html">COURS</a>
                <a class="textnodeco" href="ppe.html">PPE</a>
                <a class="textnodeco" href="stage1.html">STAGE1</a>
                <a class="textnodeco" href="stage2.html">STAGE2</a>
                <a class="textnodeco" href="perso.html">PERSO</a>
            </div>
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
		<textarea  placeholder="Tapez votre message" class="textareaDeco" id="message" rows="3" name="message" required></textarea>
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
    <div id="btn_up">
		<img alt="Retour en haut" title="Retour en haut" src="images/scrollup.png">
	</div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script type="text/javascript">
        //fonction qui permet de remonter en haut de page avec la fleche
			$(function(){
				$('#btn_up').click(function() {
					$('html,body').animate({scrollTop: 0}, 'slow');
				});
				$(window).scroll(function(){
					if($(window).scrollTop()<150){
						$('#btn_up').fadeOut();
					}else{
						$('#btn_up').fadeIn();
					}
				});
			});
	</script>
</body>
</html>