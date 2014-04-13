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
    <div class="row">
    	<div id="form-main">
            <div id="form-div">
                <form class="form" id="form1" method="post" action="mail.php">
                  <p class="name">
                    <input name="nomEnvoyeur" type="text" class="feedback-input" placeholder="Nom" id="name" required>
                  </p>
                  <p class="email">
                    <input name="emailEnvoyeur" type="email" class="feedback-input" id="email" placeholder="Email" required>
                  </p>
                  <p class="text">
                    <textarea name="message" class="feedback-input" id="comment" placeholder="Votre message" required></textarea>
                  </p>
                  <div class="submit">
                    <input type="submit" value="ENVOYER" id="button-orange"/>
                  </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div id="footer">
        <div class="row">
            <div id="textesFooter">
                <div id="textFooterNicolas">Nicolas Capiaumont</div>
                <div class="textFooterDroit">© 2014 Nicolas Capiaumont - Tous droits réservés - v1.0</div>
                <div class="textFooterDroit"><a class="textnodeco" href="http://www.btsinfogap.org/">BTS SIO GAP - Lycée Dominique Villars</a></div>
                <div class="textFooterDroit"><a class="textnodeco" href="legal.html">Mentions Legales</a></div>
            </div>
            <div id="reseaux">
                <ul>
                    <li><a class="textnodeco" id="facebook" href="https://www.facebook.com/nicolas.capiaumont" target="_blank"><img src="images/reseauxSociaux/facebook.png" alt="facebook"></a></li>
                    <li><a class="textnodeco" id="google" href="https://plus.google.com/u/0/+NicolasCapiaumont/" target="_blank"><img src="images/reseauxSociaux/googlePlus.png" alt="gogole plus"></a></li>
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
    <script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-49887952-1', 'port-folio.fr');
		ga('send', 'pageview');
	</script>
</body>
</html>