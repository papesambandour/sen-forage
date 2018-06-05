<?php
/* Smarty version 3.1.33-dev-5, created on 2018-06-05 03:34:02
  from 'E:\Projet\Php\school\GestionForage\view\layout/Main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-5',
  'unifunc' => 'content_5b15e88a866750_40278375',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '345e2a3fb4deb18c343edfeb86dc4f0ce93a2d89' => 
    array (
      0 => 'E:\\Projet\\Php\\school\\GestionForage\\view\\layout/Main.html',
      1 => 1528162414,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b15e88a866750_40278375 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>

</head>
<body>

</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11464105355b15e88a85c5d1_92164258', 'title');
?>
</title>
    <!-- l'appel de <?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
 vous permet de recupérer le chemin de votre site web  -->
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/samane.css"/>
    <!-- integration de javascript dans le moteur de rendu de vue Smarty -->
    
    <?php echo '<script'; ?>
 language=javascript>
        function load_design() {
            document.getElementById("design_js").style.color = "#40007d";
        }

    <?php echo '</script'; ?>
>
    
</head>
<body onload="load_design()">
<div class="nav navbar navbar-default navbar-fixed-top">
    <ul class="nav navbar-nav">
        <!-- l'appel de <?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
 vous permet de recupérer le chemin de votre site web  -->
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Test/index">Menu page test</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Test/getID/1">Menu page test 2</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Test/liste">Menu page test liste</a></li>
    </ul>
</div>
<img src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/image/logo.jpg" class="resize" />

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5542236015b15e88a865b04_15886676', 'body');
?>


</body>
</html>
<?php }
/* {block 'title'} */
class Block_11464105355b15e88a85c5d1_92164258 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11464105355b15e88a85c5d1_92164258',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Accueil<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_5542236015b15e88a865b04_15886676 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_5542236015b15e88a865b04_15886676',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block 'body'} */
}
