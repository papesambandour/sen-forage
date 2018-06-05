<html>
	<head>
		<meta charset="UTF-8">
		<title>page get id</title>
		<!-- l'appel de {$url_base} vous permet de recupérer le chemin de votre site web  -->
		<link type="text/css" rel="stylesheet" href="{$url_base}public/css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="{$url_base}public/css/samane.css"/>
		<style>
			h1{ 
				color: #40007d;
			}
		</style>
	</head>
	<body>
		<img src="{$url_base}public/image/logo.jpg" class="resize" />
		<div class="nav navbar navbar-default navbar-fixed-top">
			<ul class="nav navbar-nav">
				<!-- l'appel de {$url_base} vous permet de recupérer le chemin de votre site web  -->
				<li><a href="{$url_base}Test/index">Menu page test</a></li>
				<li><a href="{$url_base}Test/getID/1">Menu page test 2</a></li>
				<li><a href="{$url_base}Test/liste">Menu page test liste</a></li>
			</ul>
		</div>
		<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">
			<div class="panel panel-info">
				<div class="panel-heading">BIENVENUE A VOTRE MODELE MVC</div>
				<div class="panel-body">
					{if isset($ok)}
						{if $ok != 0}
							<div class="alert alert-success">Données ajoutées!</div>
						{else}
							<div class="alert alert-danger">Erreur!</div>
						{/if}
					{/if}
					<form method="post" action="{$url_base}Test/add">
						<div class="form-group">
							<label class="control-label">Valeur du test</label>
							<input class="form-control" type="text" name="valeur1" id="valeur1"/>
						</div>
						<div class="form-group">
							<label class="control-label">Valeur2 du test</label>
							<input class="form-control" type="text" name="valeur2" id="valeur2"/>
						</div>
						<div class="form-group">
							<input class="btn btn-success" type="submit" name="valider" value="ENvoyer"/>
							<input class="btn btn-danger" type="reset" name="annuler" value="Annuler"/>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>