<?php
/* Smarty version 3.1.33-dev-5, created on 2018-06-16 18:05:38
  from '/Users/macintosh/Documents/Projet/php/Projet DITI4 PHP/GestionForage/view/client/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-5',
  'unifunc' => 'content_5b2535524ee958_07360340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f72662c1749bd675fdfd95d36bfdd69d43388cc' => 
    array (
      0 => '/Users/macintosh/Documents/Projet/php/Projet DITI4 PHP/GestionForage/view/client/index.tpl',
      1 => 1529165136,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2535524ee958_07360340 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21349569945b2535524126e4_59254831', 'body');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21451105005b2535524ebab8_00345074', "js");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, '../layout/Main.tpl');
}
/* {block 'body'} */
class Block_21349569945b2535524126e4_59254831 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_21349569945b2535524126e4_59254831',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<div class="panel panel-primary">
		<div class="panel-heading">

			<button class="btn btn-success" data-toggle="modal" data-target="#addClient"><i class="fa fa-plus"> Client</i></button>
			<div class="row">
				<div class="col-sm-3 " style="position: relative;top:0">
					<input class="form-control pull-right" type="text" placeholder="Rechercher" id="searchClient"  />
					<i class="fa fa-search" style="position: absolute;font-size: 20px;top: 5px;right: 14px;height: 79%;" ></i>
				</div>
				<div class="col-sm-3 "  style="position: relative;top:0">

					<select name="villageInClient" id="villageInClient" style="width: 100%;background: rgb(238, 110, 115);border: 1px solid white;height: 30px;color: white">
                        <?php if ($_smarty_tpl->tpl_vars['idlaastvillageinclient']->value == '') {?>
							<option selected value="">Tous les village</option>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['idlaastvillageinclient']->value != '') {?>
							<option value="">Tous les village</option>
                        <?php }?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['villages']->value, 'ligne');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ligne']->value) {
?>
							<?php if ($_smarty_tpl->tpl_vars['idlaastvillageinclient']->value == $_smarty_tpl->tpl_vars['ligne']->value['idvillage']) {?>
								<option selected value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idvillage'];?>
"><?php echo $_smarty_tpl->tpl_vars['ligne']->value['nomvillage'];?>
</option>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['idlaastvillageinclient']->value != $_smarty_tpl->tpl_vars['ligne']->value['idvillage']) {?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idvillage'];?>
"><?php echo $_smarty_tpl->tpl_vars['ligne']->value['nomvillage'];?>
</option>
							<?php }?>

						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</div>
			</div>
			<hr>
		</div>

		<div class="panel-body">
			<table class="table table-bordered table-hover table-striped" id="tabEtu">
				<thead style="background: rgb(238, 110, 115) ; color: white !important;">
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
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clients']->value, 'ligne');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ligne']->value) {
?>
					<tr>
						<td id="id<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" >CLI-<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
</td>
						<td id="nom<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" >  <?php echo $_smarty_tpl->tpl_vars['ligne']->value['nomcomplet'];?>
</td>
						<td id="village<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" > <?php echo $_smarty_tpl->tpl_vars['ligne']->value['village']['nomvillage'];?>
</td>
						<td id="tel<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" > <?php echo $_smarty_tpl->tpl_vars['ligne']->value['tel'];?>
</td>
						<td id="adresse<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" > <?php echo $_smarty_tpl->tpl_vars['ligne']->value['adresse'];?>
</td>
						<td id="etat<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" >
							<?php if ($_smarty_tpl->tpl_vars['ligne']->value['estabonne'] == "0") {?>
								<label style="background: red;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    padding: 9px" >NON</label>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['ligne']->value['estabonne'] == "1") {?>
								<label style="background: green;color: white;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    padding: 9px">OUI</label>
							<?php }?>
						</td>
						<td style="text-align: center">
							<button class="btn btn-success" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
"
									onclick="showAddAbonnement(this)"
									data-toggle="modal" data-target="#addAbonClient">
								<i class="fa fa-cog"> Abonnement</i>
							</button>
							<button class="btn btn-success" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
"
									onclick="showEditClient(this)"
									data-toggle="modal" data-target="#editClient">
								<i class="fa fa-edit"> Edit</i>
							</button>
							<button class="btn btn-warning" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" onclick="DelClient(this)">
								<i class="fa fa-trash"> Del</i>
							</button>

						</td>
					</tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

				</tbody>


			</table>
		</div>
		<div class="panel-footer text-center" >
			Footer
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



<?php
}
}
/* {/block 'body'} */
/* {block "js"} */
class Block_21451105005b2535524ebab8_00345074 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_21451105005b2535524ebab8_00345074',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo '<script'; ?>
 src="/public/js/client.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
