{extends file="../layout/Main.tpl"}

{block name=title}Accueil{/block}
{block name=body}

<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:160px;">
	<div class="panel panel-info">
		<div class="panel-heading">BIENVENUE A VOTRE MODELE MVC</div>
		<div class="panel-body">
			<div class="alert alert-success" style="font-size:18px; text-align:justify;">
				Merci, l'équipe samanemvc vous remercie :) :
				je vous ai préparé un CRUD qui marche, il suffit tout simplement d'importer
				la base de données qui se trouve dans le dossier view puis test (view/test);
				cette base s'appelle samane_test.sql et elle comporte une seule table nommée test.
				ça vous sera très utile j'espère.
				<br/>Et surtout noubliez pas de configurer votre base de données : ou? Dans le dossier config
				puis éditez le fichier database.php. Mettez à on l'etat de la base! Bon code!!!!  :)
			</div>
			<div id="design_js">MODELE DEVELOPPE PAR Ngor SECK ! <h1>Version 1.0.3</h1></div>
		</div>
	</div>
</div>

{/block}