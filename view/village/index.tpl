{extends file='../layout/Main.tpl'}
{block name=body}

	<div class="panel panel-primary">
		<div class="panel-heading">

			<button class="btn btn-success" data-toggle="modal" data-target="#addVillage"><i class="fa fa-plus"> Village</i></button>
			<div class="form-group col-sm-3 " style="position: relative">
				<input class="form-control pull-right" type="text" placeholder="Rechercher" id="searchVillage"  />
				<i class="fa fa-search" style="position: absolute;font-size: 20px;top: 5px;right: 14px;height: 79%;" ></i>

			</div>
			<hr>
		</div>

		<div class="panel-body">
			<table class="table table-bordered table-hover table-striped" id="tabEtu">
				<thead style="background: rgb(110, 170, 238) ; color: white !important;">
				<tr >
					<th style="color: white">CODE</th>
					<th style="color: white">NOM VILLAGE</th>
					<th style="color: white">POPULATION</th>
					<th style="color: white; text-align: center">ACTION</th>
				</tr>
				</thead>
				<tbody id="tbody">
                {foreach from=$villages item=ligne}
					<tr>
						<td id="id{$ligne.idvillage}" > VILG-{$ligne.idvillage}</td>
						<td id="nom{$ligne.idvillage}" >  {$ligne.nomvillage}</td>
						<td id="eta{$ligne.idvillage}" > {$ligne.population}</td>
						<td style="text-align: center">
							<button class="btn btn-success" value="{$ligne.idvillage}"
									onclick="showChefDevillage(this)"
									data-toggle="modal" data-target="#showchef">
								<i class="fa fa-eye"> Chef</i>
							</button>
							<button class="btn btn-success" value="{$ligne.idvillage}"
									onclick="showEditVillage(this)"
									data-toggle="modal" data-target="#editVillage">
								<i class="fa fa-edit"> Edit</i>
							</button>
							<button class="btn btn-warning" value="{$ligne.idvillage}" onclick="DelVillage(this)">
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




	<!-- ADD village-->
	<div class="modal fade" id="addVillage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<h4 class="modal-title text-center">AJOUT VILLAGE</h4>

				<div class="modal-body">
					<form id="fmrAddVillage">
						<div class="row">
							<div class="col-sm-12">
								<h5 style="color: black;margin-bottom: 10px">Village</h5>
								<div class="form-group">
									<label for="nomvillageAdd" class="control-label">Nom:</label>
									<input type="text" class="form-control" id="nomvillageAdd" name="nomvillageAdd" required ">
								</div>
								<div class="form-group">
									<label for="etatvillage" class="control-label">Etat:</label>
									<select class="form-control" id="etatvillageAdd" name="etatvillageAdd" required>
										<option value="" selected hidden>...</option>
										<option value="1">Activer</option>
										<option value="0">Desactiver</option>
									</select>
								</div>
							</div>

							<div class="col-sm-12">
								<h5 style="color:black;margin-bottom: 10px">Chef de village</h5>
								<div class="form-group">
									<label for="nomchefVillageAdd" class="control-label">Nom Complete:</label>
									<input type="text" class="form-control" id="nomchefVillageAdd" name="nomchefVillageAdd" required ">
								</div>
								<div class="form-group">
									<label for="telchefVillageAdd" class="control-label">Téléphone:</label>
									<input type="tel" class="form-control" id="telchefVillageAdd" name="telchefVillageAdd" required ">
								</div>
								<div class="form-group">
									<label for="addresschefVillageAdd" class="control-label">Adresse:</label>
									<input type="text" class="form-control" id="addresschefVillageAdd" name="addresschefVillageAdd" required ">
								</div>
								<div class="form-group">
									<label for="etatvillage" class="control-label">Etat:</label>
									<select class="form-control" id="etatchefVillageAdd" name="etatchefVillageAdd" required>
										<option value="" selected hidden>...</option>
										<option value="1">Activer</option>
										<option value="0">Desactiver</option>
									</select>
								</div>
							</div>
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
	<div class="modal fade" id="editVillage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<h4 class="modal-title text-center">EDITE VILLAGE</h4>

				<div class="modal-body">
					<form id="fmrEditVillage">
						<div class="form-group">
							<label for="nomvillageEdit" class="control-label">Nom:</label>
							<input type="text" class="form-control" id="nomvillageEdit" name="nomvillageEdit" required ">
							<input type="hidden" class="form-control" id="idvillageEdit" name="idvillageEdit" required ">
							<input type="hidden" class="form-control" id="ancienChefId"  name="ancienChefId" required ">
						</div>
						<div class="form-group">
							<label for="etatvillage" class="control-label">Etat:</label>
							<select class="form-control" id="etatvillageEdit" name="etatvillageEdit" required>
								<option value="" selected hidden>Etat ...</option>
								<option value="1">Activer</option>
								<option value="0">Desactiver</option>
							</select>
						</div>
						<div class="form-group">
							<label for="etatvillage" class="control-label">Chef:</label>
							<select class="form-control" id="chefdevillageEdit" name="chefdevillageEdit" required>

							</select>
						</div>
						<div class="text-center" style="margin-bottom: 25px">
							<button type="submit" class="btn btn-primary" >Editer</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>


	<!-- show chef de village -->
	<div class="modal fade" id="showChefVillagePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="background: rgba(0,0,0,0.8)">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h4 class="modal-title text-center" id="textShowChefVillage"> </h4>
					<div style="text-align: center">Est le chef du village </div>
				</div>

			</div>
		</div>
	</div>

{/block}

{block name="js"}
	<script src="/public/js/village.js"></script>
{/block}