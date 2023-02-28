<?php
/* Smarty version 4.3.0, created on 2023-02-27 20:05:13
  from 'C:\xampp2\htdocs\GmagroWebApp\views\intervenant\login_intervenant.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63fcfee951cf53_98757471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a293ec8b800401ae214b95e487c5f382b3748ed' => 
    array (
      0 => 'C:\\xampp2\\htdocs\\GmagroWebApp\\views\\intervenant\\login_intervenant.tpl',
      1 => 1677435402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63fcfee951cf53_98757471 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="/images/gmao_logo.png" sizes="30x30" type="image/png"/>
        <title>Authentification GmaGro</title>
        <meta name="description" content="GMAO">
        <meta name="author" content="Anthony Médassi">
        <link rel="stylesheet" href="css/login_layout.css"/>
        <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css"/>
    </head>
    <body>
        <div class="wrapper fadeInDown">
            <div class="col-6">
                <div class="fadeIn first">
                    <img src="images/gmagro.png" id="icon" alt="User Icon" />
                </div>
                <form action="?uc=intervenant&action=check" method="post">
                    <input type="text" id="mail" class="fadeIn second" name="mail" placeholder="Adresse mail" required>
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de passe" required>
                    <div class="col-md-3 offset-md-3">
                        <input type="submit" class="fadeIn fourth" value="Connexion">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php }
}
