{* Smarty *}
<!DOCTYPE html>
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
            <div id="formContent">
                <div class="fadeIn first">
                    <img src="images/gmagro.png" id="icon" alt="User Icon" />
                </div>
                <form action="?uc=intervenant&action=check" method="post">
                    <input type="text" id="mail" class="fadeIn second" name="mail" placeholder="Adresse mail" required>
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de passe" required>
                    <input type="submit" class="fadeIn fourth" value="Connexion">
                </form>
            </div>
        </div>
    </body>
</html>
