<?php
/* Smarty version 3.1.33-dev-5, created on 2018-06-14 20:35:23
  from '/Users/macintosh/Documents/Projet/php/Projet DITI4 PHP/GestionForage/view/accueil/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-5',
  'unifunc' => 'content_5b22b56bdbd753_40034456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a988c1a0d24bbd833fec5cbc323c720ab125d11' => 
    array (
      0 => '/Users/macintosh/Documents/Projet/php/Projet DITI4 PHP/GestionForage/view/accueil/home.tpl',
      1 => 1528981085,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b22b56bdbd753_40034456 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7938093655b22b56bd04967_16436095', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, '../layout/Main.tpl');
}
/* {block 'body'} */
class Block_7938093655b22b56bd04967_16436095 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_7938093655b22b56bd04967_16436095',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="panel panel-primary">
        <div class="panel-heading">

            <div class="form-group col-sm-3 " style="position: relative">
                <input class="form-control pull-right" type="text" placeholder="Rechercher" id="search"  />
                <i class="fa fa-search" style="position: absolute;font-size: 20px;top: 5px;right: 14px;height: 79%;" ></i>

            </div>
            <hr>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-hover table-striped" id="tabEtu">
                <thead style="background: rgb(238, 110, 115) ; color: white !important;">
                <tr >
                    <th style="color: white">Matricule</th>
                    <th style="color: white">Last Name</th>
                    <th style="color: white">First Name</th>
                    <th style="color: white">Class</th>
                    <th style="text-align: center;color: white">Action</th>
                </tr>
                </thead>
                <tbody id="tbody">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clients']->value, 'ligne');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ligne']->value) {
?>
                    <tr>
                        <td id="matetu<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" > <?php echo $_smarty_tpl->tpl_vars['ligne']->value['nomComplet'];?>
</td>
                        <td id="matetu<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" >  <?php echo $_smarty_tpl->tpl_vars['ligne']->value['nomComplet'];?>
</td>
                        <td id="matetu<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
>" >  <?php echo $_smarty_tpl->tpl_vars['ligne']->value['nomComplet'];?>
</td>
                        <td id="matetu<?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" > <?php echo $_smarty_tpl->tpl_vars['ligne']->value['nomComplet'];?>
</td>
                        <td style="text-align: center">
                            <button class="btn btn-success" value="<?php echo '<%';?>=ligne.id<?php echo '%>';?>"
                                    onclick="showNoteEut(this)"
                                    data-toggle="modal" data-target="#showNote">
                                <i class="fa fa-eye"> Note</i>
                            </button>
                            <button class="btn btn-primary" value=" <?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
"
                                    onclick="showediteEtu(this)"
                                    data-toggle="modal" data-target="#editEtut">
                                <i class="fa fa-edit"> Edit</i>
                            </button>
                            <button class="btn btn-warning" value=" <?php echo $_smarty_tpl->tpl_vars['ligne']->value['idClient'];?>
" onclick="DelEtu(this)">
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
            <button class="btn btn-success btn-sm" id="manualLoad">Load more</button>
        </div>
    </div>
<?php
}
}
/* {/block 'body'} */
}
