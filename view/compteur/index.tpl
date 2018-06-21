{extends file='../layout/Main.tpl'}
{block name=body}

	<div class="panel panel-primary">
		<div class="panel-heading">

			<div class="row">
				<div class="col-sm-3 " style="position: relative;top:0">
					<input class="form-control pull-right" type="text" placeholder="Rechercher" id="searchCompteur"  />
					<i class="fa fa-search" style="position: absolute;font-size: 20px;top: 5px;right: 14px;height: 79%;" ></i>
				</div>
				<div class="col-sm-3 "  style="position: relative;top:0">

					<select name="villageInClient" id="villageInClient" style="width: 100%;background: rgb(238, 110, 115);border: 1px solid white;height: 30px;color: white">
                        {if $idlaastvillageinclient == ""}
							<option selected value="">Tous les village</option>
                        {/if}
                        {if $idlaastvillageinclient != ""}
							<option value="">Tous les village</option>
                        {/if}
						{foreach from=$villages item=ligne}
							{if $idlaastvillageinclient == $ligne.idvillage}
								<option selected value="{$ligne.idvillage}">{$ligne.nomvillage}</option>
							{/if}
							{if $idlaastvillageinclient != $ligne.idvillage}
								<option value="{$ligne.idvillage}">{$ligne.nomvillage}</option>
							{/if}

						{/foreach}
					</select>
				</div>
			</div>
			<hr>
		</div>

		<div class="panel-body">
			<table class="table table-bordered table-hover table-striped" id="tabEtu">
				<thead style="background: rgb(238, 110, 115) ; color: white !important;">
				<tr >
					<th style="color: white">CODE CMPT</th>
					<th style="color: white">CODE ABN</th>
					<th style="color: white">PROPRIETAIRE</th>
					<th style="color: white">VILLAGE</th>
					<th style="color: white">TEL</th>
					<th style="color: white">EST COUPÉ</th>
					<th style="color: white; text-align: center">ACTION</th>
				</tr>
				</thead>
				<tbody id="tbody">
                {foreach from=$clients item=ligne}
					<tr>
						<td id="numc{$ligne.idClient}" > CMPT- {$ligne.compteur.numerocompteur}</td>
						<td id="numa{$ligne.idClient}" > ABN- {$ligne.abonnement.numero}</td>
						<td id="nom{$ligne.idClient}" > {$ligne.nomcomplet}</td>
						<td id="villa{$ligne.idClient}" > {$ligne.village.nomvillage}</td>
						<td id="tel{$ligne.idClient}" > {$ligne.tel}</td>
						<td id="etat{$ligne.idClient}" >
							{if $ligne.compteur.escoupe +"" == 0}
								<label style="background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    padding: 9px" >NON</label>
							{/if}
							{if $ligne.compteur.escoupe +"" == 1}
								<label style="background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    padding: 9px">OUI</label>
							{/if}
						</td>
						<td style="text-align: center">
							<button class="btn btn-success" value="{$ligne.compteur.idcompteur}"
									onclick="showAddRelever(this)"
									data-toggle="modal" data-target="#addRelever">
								<i class="fa fa-plus"> Relevé</i>
							</button>


						</td>
					</tr>
                {/foreach}

				</tbody>


			</table>
		</div>
		<div class="panel-footer text-center" >
			Footer
		</div>
	</div>




	<!-- ADD RELEVER-->
	<div class="modal fade" id="addRelever" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<h4 class="modal-title text-center">AJOUT REVELER DU MOI</h4>

				<div class="modal-body">
					<form id="fmraddRelever">

						<h5 style="color: black;margin-bottom: 10px">Compteur</h5>
						<div class="form-group">
							<label for="cccmpt" class="control-label">Consommation cummulé en m3:</label>
							<input readonly="readonly" type="text" class="form-control" id="cccmpt" name="cccmpt" required ">
						</div>
						<div class="form-group">
							<label for="cMensuelcmpt" class="control-label">Mettre consommation mois courant en m3:</label>
							<input type="text" class="form-control" id="cMensuelcmpt" name="cMensuelcmpt" required ">
							<input type="hidden" class="form-control" id="idCompteur" name="idCompteur" required ">
						</div>

						<div class="form-group">
							<label for="moisrelever" class="control-label">Mois:</label>
							<select class="form-control" id="moisrelever" name="moisrelever" required>
								<option value="" selected hidden>...</option>
								<option value="1">Janvier</option>
								<option value="2">Février</option>
								<option value="3">Mars</option>
								<option value="4">Avril</option>
								<option value="5">Mai</option>
								<option value="6">Juin</option>
								<option value="7">Juillet</option>
								<option value="8">Aout</option>
								<option value="9">Septembre</option>
								<option value="10">Octobre</option>
								<option value="11">Novenmbre</option>
								<option value="12">Décembre</option>
							</select>
							<label for="anneerelever" class="control-label">Année:</label>
							<select class="form-control" id="anneerelever" name="anneerelever" required>

							</select>
						</div>
						<div class="text-center" style="margin-bottom: 25px">
							<button type="submit" class="btn btn-primary" >Enregistrer</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- EDITE VILLAGE-->
	<div class="modal fade" id="editClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<h4 class="modal-title text-center">EDITE CLIENT</h4>

				<div class="modal-body">

					<form id="fmrEditclient">

						<h5 style="color: black;margin-bottom: 10px">Client</h5>
						<div class="form-group">
							<label for="nomclientEdit" class="control-label">Nom Complete:</label>
							<input type="text" class="form-control" id="nomclientEdit" name="nomclientEdit" required ">
							<input  type="hidden" id="idclientEdit" name="idclientEdit" required ">
						</div>
						<div class="form-group">
							<label for="telclientEdit" class="control-label">Téléphone:</label>
							<input type="text" class="form-control" id="telclientEdit" name="telclientEdit" required ">
						</div>
						<div class="form-group">
							<label for="adresseclientEdit" class="control-label">Adresse:</label>
							<input type="text" class="form-control" id="adresseclientEdit" name="adresseclientEdit" required ">
						</div>
						<div class="form-group">
							<label for="villageClientAdd" class="control-label">Village:</label>
							<select class="form-control" id="villageClientEdit" name="villageClientEdit" required>
							</select>
						</div>
						<div class="form-group">
							<label for="etatclientEdit" class="control-label">Etat:</label>
							<select class="form-control" id="etatclientEdit" name="etatclientEdit" required>
								<option value="" selected hidden>...</option>
								<option value="1">Activer</option>
								<option  value="0">Desactiver</option>
							</select>
						</div>
						<div class="text-center" style="margin-bottom: 25px">
							<button type="submit" class="btn btn-primary" >Enregistrer</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>


	<!-- ADD ABONNEMENT-->
	<div class="modal fade" id="addAbonClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<h4 class="modal-title text-center">ABONNEMENT CLIENT</h4>

				<div class="modal-body">

					<form id="fmrAddAbonn">

						<h5 style="color: black;margin-bottom: 10px">Client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <div style="color: blue;">Numero Abonnment: &nbsp;&nbsp;&nbsp;&nbsp;<span id="numAbon" style="color:red"></span></div></h5>
						<div class="form-group">
							<label for="nomclientabonnee" class="control-label">Nom Client:</label>
							<input type="text" readonly="readonly" class="form-control" id="nomclientabonnee" name="nomclientabonnee" />
							<input type="hidden" class="form-control" id="idclientabonnee" name="idclientabonnee" />
						</div>
						<div class="form-group">
							<label for="dateAbonement" class="control-label">Date:</label>
							<input type="date" name="dateAbonement" id="dateAbonement" required/>
						</div>
						<div class="form-group">
							<label for="DescriptionAbon" class="control-label">Description:</label>
							<textarea rows="5" class="form-control" id="DescriptionAbon" name="DescriptionAbon" required>
							</textarea>
							<input type="hidden" name="idAbonement" id="idAbonement" value="">
						</div>

						<div class="text-center" style="margin-bottom: 25px">
							<button type="submit" class="btn btn-primary" id="btnAbonPopup">Ajouter</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>



{/block}

{block name="js"}
	<script src="/public/js/compteur.js"></script>
{/block}