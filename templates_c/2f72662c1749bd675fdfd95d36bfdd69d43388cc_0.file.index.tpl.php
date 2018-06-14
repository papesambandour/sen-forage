<?php
/* Smarty version 3.1.33-dev-5, created on 2018-06-14 20:22:48
  from '/Users/macintosh/Documents/Projet/php/Projet DITI4 PHP/GestionForage/view/client/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-5',
  'unifunc' => 'content_5b22b278280b32_10805371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f72662c1749bd675fdfd95d36bfdd69d43388cc' => 
    array (
      0 => '/Users/macintosh/Documents/Projet/php/Projet DITI4 PHP/GestionForage/view/client/index.tpl',
      1 => 1529000566,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b22b278280b32_10805371 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8676319995b22b277904200_20329529', 'body');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14642812825b22b27827dd07_47364888', "js");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, '../layout/Main.tpl');
}
/* {block 'body'} */
class Block_8676319995b22b277904200_20329529 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_8676319995b22b277904200_20329529',
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
					<th style="color: white">ID</th>
					<th style="color: white">NOM & PRENOM</th>
					<th style="color: white">Village</th>
					<th style="color: white">Etat</th>
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
" > <?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
</td>
						<td id="nom<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" >  <?php echo $_smarty_tpl->tpl_vars['ligne']->value['nomcomplet'];?>
</td>
						<td id="village<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" > <?php echo $_smarty_tpl->tpl_vars['ligne']->value['village']['nomvillage'];?>
</td>
						<td id="etat<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" > <?php echo $_smarty_tpl->tpl_vars['ligne']->value['etat_client'];?>
</td>
						<td style="text-align: center">
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
class Block_14642812825b22b27827dd07_47364888 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_14642812825b22b27827dd07_47364888',
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
