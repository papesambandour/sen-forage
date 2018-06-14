<?php
/* Smarty version 3.1.33-dev-5, created on 2018-06-14 16:50:30
  from '/Users/macintosh/Documents/Projet/php/Projet DITI4 PHP/GestionForage/view/layout/Main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-dev-5',
  'unifunc' => 'content_5b2280b6ce2a25_21213577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56c90973636dfd9a2cf2bae47913c1845a0117af' => 
    array (
      0 => '/Users/macintosh/Documents/Projet/php/Projet DITI4 PHP/GestionForage/view/layout/Main.tpl',
      1 => 1528987509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2280b6ce2a25_21213577 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="icon" href="/public/img/favicon.ico" />
    <link rel="stylesheet" href="/public/bootstrap/dist/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/public/bootstrap/dist/css/bootstrap-grid.css" type="text/css">
    <link rel="stylesheet" href="/public/bootstrap/dist/css/bootstrap-reboot.css" type="text/css">
    <link rel="stylesheet" href="/public/md.css">
    <!--
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    -->
    <link rel="stylesheet" href="/public/app.css" type="text/css">
    <title>SEN FORAGE</title>
</head>
<body style="width: 100%">
<div id="loader" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: transparent;margin:auto;z-index: 99999999999999">
    <div style="height: 50px;margin: 25% auto;width: 50px">
        <img src="/public/img/loader.gif" style="width: 100%;height: 100%"/>
    </div>
</div>
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary" style=" background: rgb(238, 110, 115) !important;position: sticky;top: 0;left: 0">
    <a class="navbar-brand" href="#">SEN FORAGE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/village">Village</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/client">Client</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Compteur</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Abonnement</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Facture</a>
            </li>
        </ul>
        <span class="navbar-text">
     Sen forage S.A
    </span>
    </div>
</nav>
<div class="container">
    <h2 id="title" class="h2 text-center label label-primary" style="background: rgb(238, 110, 115);color:white;border: solid white 2px;border-radius: 50%;height: 60px ;padding-top:10px;text-align: center;width: 50%;margin: 5px  auto">SEN FORAGE</h2>

    <div id="alert" >

    </div>
</div>


<div class="container">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9559923535b2280b6cd7fd5_34052002', 'body');
?>

</div>



<!-- ADD ETUD-->
<div class="modal fade" id="addEtut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title text-center">Ajout Etudiant</h4>
            <div class="modal-body">
                <form id="formAddEtud">
                    <div class="form-group">
                        <label for="matEtAdd" class="control-label">Matricule:</label>
                        <input type="text" class="form-control" id="matEtAdd" required="required" pattern="^MAT([0-9])+$" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="nomEtAdd" class="control-label">Nom:</label>
                        <input type="text" class="form-control" id="nomEtAdd" required="required">
                    </div>
                    <div class="form-group">
                        <label for="prenomEtAdd" class="control-label">Prenom:</label>
                        <input type="text" class="form-control" id="prenomEtAdd" required="required">
                    </div>
                    <div class="form-group">
                        <label for="classEtAdd" class="control-label">Classe:</label>
                        <input type="text" class="form-control" id="classEtAdd" required="required">
                    </div>
                    <div class="text-center" style="margin-bottom: 25px">
                        <button type="submit" class="btn btn-primary" id="btnAddEtu">Enregistrer</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- ADD Note-->
<div class="modal fade" id="addNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="height: auto !important;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title text-center">Ajout Note</h4>
            <div class="modal-body" style="max-height: 500px; overflow: auto">
                <form id="frmAddNote">
                    <div class="form-group">
                        <label for="valNote" class="control-label">Valeur:</label>
                        <input type="number"  step=0.01 class="form-control" min="0" max="20" id="valNote" required="required">
                    </div>
                    <div class="form-group">
                        <label for="anneNote" class="control-label">Annee:</label>
                        <input type="text" class="form-control" id="anneNote" required pattern="^([0-9])+$">
                    </div>
                    <div class="form-group">
                        <label for="semNote" class="control-label">Semestre:</label>
                        <input type="number" class="form-control" id="semNote" min="1" max="2" required>
                    </div>
                    <div class="form-group">
                        <label for="matierNote" class="control-label">Matiere:</label>
                        <input type="text" class="form-control" id="matierNote" required="required">
                    </div>
                    <div class="form-group">
                        <label for="matierNote" class="control-label">Etudiant</label>
                        <select class="form-control" id="idEtudiant" required="required">

                        </select>
                    </div>

                    <div class="text-center" style="margin-bottom: 25px">
                        <button type="submit" class="btn btn-primary" id="submitNote">Enregistrer</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<!-- SHOW Note-->
<div class="modal fade" id="showNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content" style="max-height: 400px;overflow:auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title text-center">Tableau de notes</h4>
            <label style="font-size: 11px;text-align: center">Double click pour editer - Entrer pour enregistrer</label>
            <div class="modal-body">
                <table class="table table-hover table-bordered" id="TabNote">
                    <thead>
                    <tr>
                        <td>Valeur</td>
                        <td>Matiere</td>
                        <td>Semestre</td>
                        <td>Année</td>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- show aplication -->
<div class="modal fade" id="tecnologi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="background: rgba(0,0,0,0.8)">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title text-center" style="font-size: 40px"> JQUERY AND NODE JS</h4>
            <div class="modal-body">
                <h4 class="modal-title text-center"> SINGLE PAGE APPLICATION</h4>
            </div>

        </div>
    </div>


<?php echo '<script'; ?>
 src="/public/jquery/dist/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/nprogress.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/poper.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/bootstrap/dist/js/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/bootstrap/dist/js/bootstrap.bundle.js"><?php echo '</script'; ?>
>
<!--
<?php echo '<script'; ?>
 src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"><?php echo '</script'; ?>
>
-->
<?php echo '<script'; ?>
 src="/public/md.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/public/js/app.js"><?php echo '</script'; ?>
>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12159386565b2280b6cdfca8_80372741', "js");
?>


</body>
</html>

<?php }
/* {block 'body'} */
class Block_9559923535b2280b6cd7fd5_34052002 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_9559923535b2280b6cd7fd5_34052002',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php
}
}
/* {/block 'body'} */
/* {block "js"} */
class Block_12159386565b2280b6cdfca8_80372741 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_12159386565b2280b6cdfca8_80372741',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php
}
}
/* {/block "js"} */
}
