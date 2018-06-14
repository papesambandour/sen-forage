<?php
/* Smarty version 3.1.33-dev-5, created on 2018-06-14 16:58:06
  from '/Users/macintosh/Documents/Projet/php/Projet DITI4 PHP/GestionForage/view/village/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-5',
  'unifunc' => 'content_5b22827eac8564_33805379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '631615aa46475d89578b2ee262342ce013c35865' => 
    array (
      0 => '/Users/macintosh/Documents/Projet/php/Projet DITI4 PHP/GestionForage/view/village/index.tpl',
      1 => 1528987225,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b22827eac8564_33805379 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6702912595b22827ea67e32_70535318', 'body');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15584002935b22827eac5d26_71471235', "js");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, '../layout/Main.tpl');
}
/* {block 'body'} */
class Block_6702912595b22827ea67e32_70535318 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_6702912595b22827ea67e32_70535318',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


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
				<thead style="background: rgb(238, 110, 115) ; color: white !important;">
				<tr >
					<th style="color: white">ID</th>
					<th style="color: white">NOM VILLAGE</th>
					<th style="color: white">ETAT</th>
					<th style="color: white; text-align: center">ACTION</th>
				</tr>
				</thead>
				<tbody id="tbody">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['villages']->value, 'ligne');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ligne']->value) {
?>
					<tr>
						<td id="id<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idvillage'];?>
" > <?php echo $_smarty_tpl->tpl_vars['ligne']->value['idvillage'];?>
</td>
						<td id="nom<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idvillage'];?>
" >  <?php echo $_smarty_tpl->tpl_vars['ligne']->value['nomvillage'];?>
</td>
						<td id="eta<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idvillage'];?>
" > <?php echo $_smarty_tpl->tpl_vars['ligne']->value['etat_village'];?>
</td>
						<td style="text-align: center">
							<button class="btn btn-success" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idvillage'];?>
"
									onclick="showChefDevillage(this)"
									data-toggle="modal" data-target="#showchef">
								<i class="fa fa-eye"> Chef</i>
							</button>
							<button class="btn btn-success" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idvillage'];?>
"
									onclick="showEditVillage(this)"
									data-toggle="modal" data-target="#editVillage">
								<i class="fa fa-edit"> Edit</i>
							</button>
							<button class="btn btn-warning" value="<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idvillage'];?>
" onclick="DelVillage(this)">
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
			FOOTER
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
							<div class="col-sm-6">
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

							<div class="col-sm-6">
								<h5 style="color:black;margin-bottom: 10px">Chef de village</h5>
								<div class="form-group">
									<label for="nomchefVillageAdd" class="control-label">Nom Complete:</label>
									<input type="text" class="form-control" id="nomchefVillageAdd" name="nomchefVillageAdd" required ">
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

<?php
}
}
/* {/block 'body'} */
/* {block "js"} */
class Block_15584002935b22827eac5d26_71471235 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_15584002935b22827eac5d26_71471235',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo '<script'; ?>
 src="/public/js/village.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
