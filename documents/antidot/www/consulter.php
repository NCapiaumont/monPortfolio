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
<!-- affichage d'une image qui indique que la page est en construction -->
<div class="imageMaxSize">
	<img src="imgs/Page-en-construction.png">
</div>
<?php
include("parametre.php");
?>
<div class="center">
	<h1>/!\ Espace réservé aux administrateurs /!\</h1>
	<h2>Selectionnez une demande</h2>
	<form id="formConsulter" method="post" action="formConsult.php">
		<label class="center">Les demandes :</label>
		<select name="lesDemandes" data-placeholder="Choix de distribution..." class="chosen-select-deselect" tabindex="2">
			<option value=""></option>
			<?php
			$requete="select idDemande, nomDemandeur, nomMachine, dateDemande from demande order by dateDemande";
			$result=mysql_query($requete);
			while ($ligne=mysql_fetch_array($result))
			{
				echo '<option value="'.$ligne["idDemande"].'">'.$ligne["dateDemande"].' '.$ligne["nomDemandeur"].' '.$ligne["nomMachine"].'</option>';
			}
			?>
		</select>
		<!-- Debut bouton valider -->
		<p>
			<div class="mobileCenter">
				<input class="submit" name="choisir" type="submit" value="Choisir">
			</div>
		</p>
		<!-- Fin bouton valider -->
	</form>
</div>
<div id="emplacementFormulaire">
</div>
<script>
// Debut script ajax qui permet d'envoyer le formulaire et de rester sur la page sans la rafraichir
$(document).ready( function() {
	$("#formConsulter").submit(function () {
		$.post("formConsult.php",$("#formConsult").serialize(),function(texte){//charge la page formConsult.php
			$("div#emplacementFormulaire").html(texte);//écrit a la place du formulaire (dans la div emplacementFormulaire)
		});
			return false; // ne change pas de page
	});
});
-->
</script>

