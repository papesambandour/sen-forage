{extends file='../layout/Main.tpl'}
{block name=body}

	<div class="panel panel-primary">
		<div class="panel-heading">

			<button class="btn btn-success" data-toggle="modal" data-target="#addClient"><i class="fa fa-plus"> Client</i></button>
			<div class="row">
				<div class="col-sm-3 " style="position: relative;top:0">
					<input class="form-control pull-right" type="text" placeholder="Rechercher" id="searchClient"  />
					<i class="fa fa-search" style="position: absolute;font-size: 20px;top: 5px;right: 14px;height: 79%;" ></i>
				</div>
				<div class="col-sm-3 "  style="position: relative;top:0">

					<select name="villageInClient" id="villageInClient" style="width: 100%;background: rgb(110, 170, 238);border: 1px solid white;height: 30px;color: white">
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
				<thead style="background: rgb(110, 170, 238) ; color: white !important;">
				<tr >
					<th style="color: white">CODE</th>
					<th style="color: white">NOM & PRENOM</th>
					<th style="color: white">Village</th>
					<th style="color: white">TEL</th>
					<th style="color: white">ADRESSE</th>
					<th style="color: white">Est Abonné</th>
					<th style="color: white; text-align: center">ACTION</th>
				</tr>
				</thead>
				<tbody id="tbody">
                {foreach from=$clients item=ligne}
					<tr>
						<td id="id{$ligne.idClient}" >CLI-{$ligne.idClient}</td>
						<td id="nom{$ligne.idClient}" >  {$ligne.nomcomplet}</td>
						<td id="village{$ligne.idClient}" > {$ligne.village.nomvillage}</td>
						<td id="tel{$ligne.idClient}" > {$ligne.tel}</td>
						<td id="adresse{$ligne.idClient}" > {$ligne.adresse}</td>
						<td id="etat{$ligne.idClient}" >
							{if $ligne.estabonne == "0"}
								<label style="background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    padding: 9px" >NON</label>
							{/if}
							{if $ligne.estabonne == "1"}
								<label style="background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    padding: 9px">OUI</label>
							{/if}
						</td>
						<td style="text-align: center">
							<button class="btn btn-success" value="{$ligne.idClient}"
									onclick="showAddAbonnement(this)"
									data-toggle="modal" data-target="#addAbonClient">
								<i class="fa fa-cog"> Abonnement</i>
							</button>
							<button class="btn btn-success" value="{$ligne.idClient}"
									onclick="showEditClient(this)"
									data-toggle="modal" data-target="#editClient">
								<i class="fa fa-edit"> Edit</i>
							</button>
							<button class="btn btn-warning" value="{$ligne.idClient}" onclick="DelClient(this)">
								<i class="fa fa-trash"> Del</i>
							</button>

						</td>
					</tr>
                {/foreach}

				</tbody>


			</table>
		</div>
		<div class="panel-footer text-center" >

		</div>
	</div>




	<!-- ADD client-->
	<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<h4 class="modal-title text-center">AJOUT CLIENT</h4>

				<div class="modal-body">
					<form id="fmrAddclient">

						<h5 style="color: black;margin-bottom: 10px">Client</h5>
						<div class="form-group">
							<label for="nomclientAdd" class="control-label">Nom Complete:</label>
							<input type="text" class="form-control" id="nomclientAdd" name="nomclientAdd" required ">
						</div>
						<div class="form-group">
							<label for="telclientAdd" class="control-label">Téléphone:</label>
							<input type="text" class="form-control" id="telclientAdd" name="telclientAdd" required ">
						</div>
						<div class="form-group">
							<label for="adresseclientAdd" class="control-label">Adresse:</label>
							<input type="text" class="form-control" id="adresseclientAdd" name="adresseclientAdd" required ">
						</div>
						<div class="form-group">
							<label for="villageClientAdd" class="control-label">Village:</label>
							<select class="form-control" id="villageClientAdd" name="villageClientAdd" required>
							</select>
						</div>
						<div class="form-group">
							<label for="etatclientAdd" class="control-label">Etat:</label>
							<select class="form-control" id="etatclientAdd" name="etatclientAdd" required>
								<option value="" selected hidden>...</option>
								<option value="1">Activer</option>
								<option value="0">Desactiver</option>
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
							<label for="codeclientabonnee" class="control-label">Code Client:</label>
							<input type="text" readonly="readonly" class="form-control" id="codeclientabonnee" name="codeclientabonnee" />

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
	<script src="/public/js/client.js"></script>
{/block}