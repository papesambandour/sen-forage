<?php
/* Smarty version 3.1.33-dev-5, created on 2018-06-05 03:34:02
  from 'E:\Projet\Php\school\GestionForage\view\accueil\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-5',
  'unifunc' => 'content_5b15e88a7e12c8_44413841',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e13e1099fd824bdb08b35ac202ccdc783d599060' => 
    array (
      0 => 'E:\\Projet\\Php\\school\\GestionForage\\view\\accueil\\index.html',
      1 => 1528162419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b15e88a7e12c8_44413841 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17167049525b15e88a7dcda4_36325865', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12024594775b15e88a7df830_31041116', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../layout/Main.html");
}
/* {block 'title'} */
class Block_17167049525b15e88a7dcda4_36325865 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_17167049525b15e88a7dcda4_36325865',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Accueil<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_12024594775b15e88a7df830_31041116 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_12024594775b15e88a7df830_31041116',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


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

<?php
}
}
/* {/block 'body'} */
}
