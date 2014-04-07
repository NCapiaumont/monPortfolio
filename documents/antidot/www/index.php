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
<!DOCTYPE html>
<html>
<!-- Debut balise head -->
<head>
	<!-- Debut ajout des meta -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Fin ajout des meta -->	
	<!-- Ajout du favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<!-- Debut ajout des feuilles de styles -->
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
	<link rel="stylesheet" href="style/chosen.min.css">
	<!-- Fin ajout des feuilles de styles -->
	<!-- Ajout du titre de la page -->
    <title>Fully Automatic Install</title>
</head>
<!-- Fin balise head -->
<!-- Debut balise body -->
<body>
<div id="titlePage">
	<div id="logo">
		<a href="index.php"><img src="imgs/logo-antidot.png" alt="image antidot"/></a>
	</div>
	<h1 class="titrePage">Interface de demande de machines</h1>
</div>
<!-- Debut du menu -->
<div id="menu">
	<p>
		<!-- Debut des boutons représentant un menu -->
		<input class="nav" type="button" value="Accueil" name="accueil.html">
  		<input class="nav" type="button" value="Demander" name="demander.html">
  		<!-- Ajouter menu consulter quand il sera terminé, test erreur est un test si la page n'a pas était trouvé.
		<input class="nav" type="button" value="Consulter" name="consulter.php">
  		<input class="nav" type="button" value="ErreurTest" name="Erreur">
		Fin des boutons représentant un menu -->		
	</p>
</div>
<!-- Fin du menu -->
<!-- Debut de la page -->
<div id="page">
	<!-- Debut du contenu de la page -->
	<div id="contenuPage">
		<!-- Debut message de bienvenue quand on arrive sur l'accueil -->
		<div id="bienvenue">
  			<h1>Fully Automatic Install</h1>
			<p>Bienvenue sur l'interface de demande et de consultation des demandes de nouvelles machines.</p>
  			<p>Veuillez sélectionner une section.</p>
			<div class="imageMaxSize">
				<img src="imgs/keep-calm.png" alt="keep calm">
			</div>
		</div>
		<!-- Fin message de bienvenue quand on arrive sur l'accueil -->		
	</div>
	<!-- Fin du contenu de la page -->
</div>
<!-- Fin de la page -->
<!-- Debut block footer -->
<div id="footer">
	<!-- Block social -->
	<ul id="social">
		<li id="facebook">
			<a href="https://www.facebook.com/antidot.net" rel="me" target="_blank">
				<img src="imgs/contact/ico_facebook.png"  alt="Facebook"/>
			</a>
		</li>
		<li id="google">
			<a href="https://plus.google.com/107226759475153864197/posts" rel="me" target="_blank">
				<img src="imgs/contact/ico_google.png"  alt="Google+"/>
			</a>
		</li>
		<li id="linkedin">
			<a href="http://www.linkedin.com/company/58123" rel="me" target="_blank">
				<img src="imgs/contact/ico_linkedin.png"  alt="LinkedIn"/>
			</a>
		</li>
		<li id="rss">
			<a href="http://blog.antidot.net/feed/" rel="me" target="_blank">
				<img src="imgs/contact/ico_rss.png"  alt="RSS"/>
			</a>
		</li>
		<li id="twitter">
			<a href="https://twitter.com/AntidotNet" rel="me" target="_blank">
				<img src="imgs/contact/ico_twitter.png"  alt="Twitter"/>
			</a>
		</li>
	</ul>
	<!-- Fin block social -->
	<!-- ajout du copyright et du lien du site d'antidot -->
    Copyright 2014 <a href=http://www.antidot.net/>Antidot</a> - Tous droits réservés
</div>
<!-- Fin block footer -->
<!-- Debut bouton retour vers le haut -->
<div id="btn_up">
	<img alt="Retour en haut" title="Retour en haut" src="imgs/fleche-jusqua-icone-9608-96.png" />
</div>
<!-- Fin bouton retour vers le haut -->
<!-- Debut JavaScript -->
<!-- link des scripts javascript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="style/chosen.jquery.min.js" type="text/javascript"></script>
<script src="style/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
//fonction pour les <select> avec chosen
function select(){
	var config = {
		'.chosen-select'           : {},
		'.chosen-select-deselect'  : {allow_single_deselect:true},
	}
	for (var selector in config) {
		$(selector).chosen(config[selector]);
	}
}
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
//fonctions qui permettent de charger un fichier dans la page
function loadFile(file) {
        $.get(file).done(function(data){
		$('#contenuPage').html(data);
		afficherPopover();
		select();
	}).fail(function(){
		$('#contenuPage').html('<div id="error"><img src="imgs/404.jpg" alt="error 404, not found" ></div>');
	});
}  
(function() { // Comme d'habitude, une fonction anonyme pour éviter les variables globales
  var inputs = document.getElementsByTagName('input'),
      inputsLen = inputs.length;        
  for (var i = 0 ; i < inputsLen ; i++) {          
      inputs[i].onclick = function() {
	  loadFile(this.name); // À chaque clique, un fichier sera chargé dans la page (prend le nom comme nom de fichier)
      };
  }
})();
//fonction pour le popover (bulle d'information)
function afficherPopover(){
    $(function(){
	    $('.popover-test').popover();    
	    $('[rel=popover]').popover({ 
		html : true, 
			content: function() {
		  		return $('#popover_content_wrapper').html();
			}
	    });
    });
}
-->
</script>
<!-- Fin JavaScript -->
</body>
<!-- Fin balise body -->
</html>
