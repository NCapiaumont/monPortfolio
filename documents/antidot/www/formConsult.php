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
//probleme pour récupérer les demandes....
$idDemandes	= $_POST['lesDemandes'];
?>
<?php print_r($_POST); ?>
<!-- Debut du gros block formulaire qui est composé de petits blocks rétractablent -->
<form id="formConsult" method="post" action="cible.php">
	<div id="blockFormulaire">
		<!-- Debut du block informations personnelles qui compose le gros block -->
		<div class="block">
			<!-- Debut du block deroulant avec le nom de la "section" -->
			<div id="deroulant">
				<a class="afficher" href="javascript:slideAffiche('r0');" >
					Informations personnelles
				</a>
			</div>
			<!-- Fin du block deroulant avec le nom de la "section" -->
			<!-- Debut du block affiche contenu -->			
			<div class="afficheContenu" id="r0" >
				<!-- Debut block informations personnelles -->
				<fieldset>
					<!-- Debut block nom du demandeur -->
					<p>
						<label for="vNom">Nom demandeur :</label>
						<input class="text" id="vNom" type="text" name="nom" placeholder="Entrez nom demandeur" required>
					</p>
					<!-- Fin block nom du demandeur -->
					<!-- Debut block email du demandeur -->
					<p>    
						<label for="vMail">Email demandeur :</label>
						<input class="text" id="vMail" type="email" name="email" placeholder="Entrez email demandeur" required>
					</p>
				</fieldset>
				<!-- Fin block informations personnelles -->
			</div>
			<!-- Fin du block affiche contenu -->
		</div>
		<!-- Fin du block informations qui compose le gros block -->
		<!-- Debut du block informations personnelles qui compose le gros block -->
		<div class="block">
			<!-- Debut du block deroulant avec le nom de la "section" -->
			<div id="deroulant">
				<a class="afficher" href="javascript:slideAffiche('r1');" >
					Commentaire
				</a>
			</div>
			<!-- Fin du block deroulant avec le nom de la "section" -->
			<!-- Debut du block affiche contenu -->			
			<div class="afficheContenu" id="r1" >
				<!-- Debut block informations personnelles -->
				<fieldset>
					<!-- Debut block commentaire -->
					<p>
						<label for="comm">Commentaires :</label>
						<textarea class="textarea" id="comm" rows="3" name="commentaires" onfocus="if (this.value=='Tapez ici vos commentaires') this.value='';" onblur="if (this.value=='') this.value='Tapez ici vos commentaires';">Tapez ici vos commentaires</textarea>
					</p>
					<!-- Fin block commentaire -->
				</fieldset>
				<!-- Fin block informations personnelles -->
			</div>
			<!-- Fin du block affiche contenu -->
		</div>
		<!-- Fin du block informations qui compose le gros block -->
		<!-- Debut du block informations minimals qui compose le gros block -->
		<div class="block">
			<div id="deroulant">
				<a class="afficher" href="javascript:slideAffiche('r2');" >
					Informations machine
				</a>
			</div>
			<!-- Debut du block affiche contenu -->
			<div class="afficheContenu" id="r2" >
				<!-- Debut block informations obligatoires -->
				<fieldset>
					<p>
						<!-- Debut block nom de la machine -->
						<label for="nomM">Nom de la machine :</label>
						<input class="text" id="nomM" type="text" name="nomMachine" placeholder="Entrez le nom de la machine" >
					</p>
					<!-- Fin block nom de la machine -->
					<!-- Debut block type machine -->
					<p>
						<label for="machine">Machine :</label>
						<select id="machine" name="machine" data-placeholder="Choix de machine..." class="chosen-select-deselect" tabindex="2">
							<option value=""></option>
							<option value="virtuelle">Virtuelle</option>
							<option value="physique">Physique</option>
							<option value="container">Container</option>
						</select>
					</p>
					<!-- Fin block type machine -->
					<!-- Debut block distribution et version -->
					<p>
						<label for="distri">Distribution :</label>
						<select id="distri" name="distribution" data-placeholder="Choix de distribution..." class="chosen-select-deselect" tabindex="2">
							<option value=""></option> 	            
							<option value="Debian">Debian</option>
							<option value="RHEL">RHEL</option>
						</select>
					</p>
					<!-- Debut version si debian -->
					<div id="VDebian" class="cacher">
						<p>
							<label for="version">Version :</label>
							<select id="version" name="version" data-placeholder="Choix de la version..." class="chosen-select-deselect" tabindex="2">
								<option value=""></option>
								<option value="Wheezy">Wheezy</option>
								<option value="Squeeze">Squeeze</option>
							</select>
						</p>
					</div>
					<!-- Fin version si debian -->
					<!-- Debut version si RHEL -->
					<div id="VRHEL" class="cacher">	
						<p>
							<label for="version">Version :</label>
							<select id="version" name="version" data-placeholder="Choix de la version..." class="chosen-select-deselect" tabindex="2">
								<option value=""></option>
								<option value="6.0">6.0</option>
								<option value="5.5">5.5</option>
							</select>
						</p>
					</div>
					<!-- Fin version si RHEL -->
					<!-- Fin block distribution et version -->
					<!-- Debut block type install -->
					<p>
						<label>Type disponible :</label>
						<select id="type" name="type[]"  data-placeholder="Selection des types ..." class="chosen-select" multiple tabindex="4">
							<option value=""></option>
							<option value="AFS">AFS</option>
							<option value="AIF">AIF</option>
							<option value="ABO">ABO</option>
							<option value="AUM">AUM</option>
							<option value="ACS">ACS</option>
							<option value="INFRA">INFRA</option>
							<option value="FLUID">FLUID</option>
							<option value="LXC">LXC</option>
							<option value="MINIPROD_DLV">MINIPROD_DLV</option>
							<option value="MINIPROD_FLUID">MINIPROD_FLUID</option>
							<option value="MEDIUMTEST">MEDIUMTEST</option>
							<option value="WEB">WEB</option>
						</select>
					</p>
					<!-- Fin block type install -->
					<!-- Debut block version et branch type -->
					<p>
						<div id="versionTypeView" class="cacher">
							<label for="typeV">Version :</label>
							<select id="typeV" name="typeVersion" data-placeholder="Choix de version..." class="chosen-select-deselect" tabindex="2">
								<option value=""></option>
								<option value="7.7">7.7</option>
								<option value="7.6">7.6</option>
								<option value="7.5">7.5</option>
								<option value="60BJ">60BJ</option>
							</select>
					</p>
					</div>
					<p>
						<div id="branchView" class="cacher">
							<label for="branch">Branch :</label>
							<select id="branch" name="branch" data-placeholder="Choix de branch..." class="chosen-select-deselect" tabindex="2">
								<option value=""></option>
								<option value="stable">Stable</option>
								<option value="unstable">Unstable</option>
								<option value="testing">Testing</option>
							</select>
						</div>
					</p>
					<!-- Fin block version et branch type -->
				</fieldset>
			<!-- Fin block informations obligatoires -->
			</div>
			<!-- Fin du block affiche contenu -->
		</div>
		<!-- Fin du block informations minimals qui compose le gros block -->
		<!-- Debut du block zone expert qui compose le gros block -->
		<div class="block">
			<!-- Debut du block deroulant avec le nom de la "section" -->
			<div id="deroulant">
				<a class="afficher" href="javascript:slideAffiche('r3');" >
					Zone Expert
				</a>
			</div>
			<!-- Fin du block deroulant avec le nom de la "section" -->
			<!-- Debut du block affiche contenu -->			
			<div class="afficheContenu" id="r3" >
				<fieldset>
					<!-- Debut block email admin -->
					<p>
						<label for="admin">Email admin* :</label>
						<input class="text" onblur="if (value=='') this.value='soc@antidot.net';" list="admin" type="email" id="admin" name="emailAdmin" value="soc@antidot.net" placeholder="Entrez l'email d'un des administrateurs" required>
						<datalist id="admin">
							<option value="soc@antidot.net">
							<option value="stagiairelambesc1@antidot.net">
						</datalist>
					</p>
					<!-- Fin block email admin -->
					<!-- Debut block espace disque -->	
					<p>
						<label for="espace">Espace disque :</label>
						<input class="text" id="espace" name="espace" type="text" placeholder="Taille mini en Go">
						<label class="labelGo">Go</label>
					</p>
					<!-- Fin block espace disque -->
					<!-- Debut block raid -->
					<div id="raidView" class="cacher">
						<p>
							<label>RAID :</label>
							<p>
								<label class="labelGo" for="ouiR">Oui</label>
								<input class="radio" type=radio name="raid" value="true" id="ouiR">
								<label class="labelGo" for="nonR">Non</label>
								<input class="radio" type=radio name="raid" value="false" id="nonR" checked>
							</p>
						</p>
					</div>
					<!-- Fin block raid -->
					<!-- Debut block processeur et coeur -->
					<p>
						<label for="processeur">Processeur :</label>
						<select id="processeur" name="processeur" data-placeholder="Nombre de processeur..." class="chosen-select-deselect" tabindex="2">
							<option value=""></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</p>
					<p>	
						<div id="coeurView" class="cacher">
							<label for="coeur">Coeur :</label>
							<select id="coeur" name="coeur" data-placeholder="Nombre de coeur..." class="chosen-select-deselect" tabindex="2">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</p>
					<!-- Fin block processeur et coeur -->
					<!-- Debut block ram -->
					<p>
						<label for="ram">RAM :</label>
						<input class="text" id="ram" name="ram" type="text" placeholder="RAM mini en Go">
						<label class="labelGo">Go</label>
					</p>
					<!-- Fin block ram-->
					<!-- Debut block adresse ip -->
					<p>
						<label for="ip">IP :</label>
						<input class="text" id="ip" type="text" name="ip" placeholder="Entrez une adresse ip">
					</p>
					<!-- Fin block adresse ip -->
					<!-- Debut block acces exterieur -->
					<p>
					<label>Accès extérieur :</label>
						<p>	
							<label class="labelGo" for="ouiE">Oui</label>
							<input class="radio" type="radio" name="acces" value="true" id="ouiE">
							<label class="labelGo" for="nonE">Non</label>
							<input class="radio" type="radio" name="acces" value="false" id="nonE" checked>
						</p>
					</p>
					<!-- Fin block acces exterieur -->
				</fieldset>
				<!-- Fin block espace expert -->
			</div>
			<!-- Fin du block affiche contenu -->
		</div>
		<!-- Fin du block zone expert qui compose le gros block -->
	</div>
	<!-- Fin du gros block formulaire qui est composé de petits blocks rétractablent -->
	<!-- Debut bouton valider + texte d'indication -->
	<p>
		<div class="mobileCenter">
			<input class="submit" name="valider" type="submit" value="Envoyer">
		</div>
		
	</p>
<!-- Fin bouton valider + texte d'indication -->
</form>
<!-- Debut des scripts javascript -->
<script type="text/javascript">
<!--
	//script qui permet d'afficher si on selectionne physique raid et le cacher dans le cas contaire
	$("select[name='machine']").change( function(){
	// lorsqu'un nouveau type de machine est sélectionné
		if(($("select[name='machine'] > option:selected").val())=="physique"){
			//affiche l'option raid
			$('#raidView').removeClass('cacher'); 
		}else{//si physique n'est pas selectionné alors passe display a none (cache raid)
			$('#raidView').addClass('cacher'); 						
		}
	});
	//script qui permet d'afficher si on selectionne debian les versions de debian et si on selectionne RHEL les version RHEL
	$("select[name='distribution']").change( function(){
	// lorsqu'une distribution est sélectionné
		if(($("select[name='distribution'] > option:selected").val())=="Debian"){//si debian est selectionné
			//on affiche l'option version debian
			$('#VDebian').removeClass('cacher');
			//on cache  l'option version RHEL
			$('#VRHEL').addClass('cacher');
		}else if(($("select[name='distribution'] > option:selected").val())=="RHEL"){//si rhel est selectionné
			//on affiche l'option version RHEL
			$('#VRHEL').removeClass('cacher');
			//on cache l'option version debian
			$('#VDebian').addClass('cacher');			
		}else{//si debian et rhel ne sont pas selectionné
			//on cache l'option debian
			$('#VDebian').addClass('cacher');			
			//on cache l'option RHEL 
			$('#VRHEL').addClass('cacher');				
		}
	});

	//script qui permet d'afficher le nombre de coeur si on selectionne au minimum un processeur
	$("select[name='processeur']").change( function(){
	// lorsqu'une distribution est sélectionné
		if(($("select[name='processeur'] > option:selected").val())!=""){//si au moins un processeur est selectionné
			//on affiche l'option nombre de coeur
			$('#coeurView').removeClass('cacher');
		}else{
			//on cache  l'option nombre de coeur
			$('#coeurView').addClass('cacher');
		}
	});
	//script qui permet d'afficher l'option version type et branch type
	$("select[name='type[]']").change( function(){
	// lorsqu'un type est selectionné
		if(($("select[name='type[]'] > option:selected").val())!=""){//si au moins un type d'installation est selectionné
			//on affiche l'option version du type d'installation
			$('#versionTypeView').removeClass('cacher');
			//on affiche l'option branch du type d'installation
			$('#branchView').removeClass('cacher');
		}else{// BUG /!\ cache pas !
			//on cache  l'option version du type d'installation
			$('#versionTypeView').addClass('cacher');
			//on cache  l'option branch du type d'installation
			$('#branchView').addClass('cacher');
		}
	});
	//Début du script javascript qui permet de cacher et afficher une partie du formulaire
	function slideAffiche(reponsechoisie) {
		$('.afficheContenu').each(function(index) {
			if ($(this).attr("id") == reponsechoisie) {
				if ($(this).is(":hidden")) { // si le bloc était bien cachée on l'affiche
					$(this).slideDown(150);
					$(this).parent().addClass('active');

				}else { // si le bloc était déjà ouvert, on le cache
					$(this).slideUp(150);
					$(this).parent().removeClass('active');
				}
			}
		});
	}
	// Debut script ajax qui permet d'envoyer le formulaire et de rester sur la page sans la rafraichir
	$(document).ready( function() {
		$("#formConsult").submit(function () {
			$.post("cibleConsult.php",$("#formConsult").serialize(),function(texte){//charge la page cible.php
				$("div#emplacementFormulaire").html(texte);//écrit a la place du formulaire (dans la div contenuPage)
			});
				return false; // ne change pas de page
		});
	});
-->
</script>
<!-- Fin des scripts javascript-->
