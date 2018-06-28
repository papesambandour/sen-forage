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
							{if $ligne.compteur.estcoupe  == 0}
								<label style="background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    padding: 9px" >NON</label>
							{/if}
							{if $ligne.compteur.estcoupe  == 1}
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
							<input type="text" class="form-control" id="cMensuelcmpt" name="cMensuelcmpt" required onkeyup="this.value = this.value.replace(/[^0-9]/,'')" ">
							<input type="hidden" class="form-control" id="idCompteur" name="idCompteur" required ">
						</div>

						<div class="form-group">
							<label for="moisrelever" class="control-label">Mois:</label>
							<select class="form-control" id="moisrelever" name="moisrelever" required>


							</select>
							<label for="anneerelever" class="control-label">Année:</label>
							<select class="form-control" id="anneerelever" name="anneerelever" required>

							</select>
						</div>
						<div class="text-center" style="margin-bottom: 25px">
							<button type="submit" class="btn btn-primary" id="addRev">Ajouter</button>
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