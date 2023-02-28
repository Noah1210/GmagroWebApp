<?php
/* Smarty version 4.3.0, created on 2023-02-27 20:13:36
  from 'C:\xampp2\htdocs\GmagroWebApp\views\info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63fd00e05fa8e4_39333859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c1ca752367924b749f9df7eb8ced732dc5a6869' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\GmagroWebApp\\views\\info.tpl',
      1 => 1677435402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63fd00e05fa8e4_39333859 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="fr" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            $(document).ready(function () {
                $("#myModal").modal('show');
            });
        <?php echo '</script'; ?>
>
    </head>
    <body>
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</h5>

                    </div>
                    <div class="modal-body">
                        <p><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
                        <button type="button" class="close" data-dismiss="modal" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
';">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html><?php }
}
