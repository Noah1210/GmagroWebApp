{* Smarty *}
<!doctype html>
<html lang="fr" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{block "titre"}Titre{/block}</title>
        <link rel="stylesheet" href="css/index.css"/>
        <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="vendor/twbs/bootstrap-icons/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div id="div_identite" class="col-xl-2 col-md-3">
                    <h5>{$smarty.session.admin.prenom} {$smarty.session.admin.nom|upper}</h5>
                    <h6>{$smarty.session.admin.role_code}</h6>
                    <a href="?uc=disconnect"><button type="button" class="btn btn-primary">Déconnexion</button></a>
                </div>
                <div id="div_logo" class="col-xl-10 col-md-8">
                    <img src="images/gmagro.png" alt="Logo GMAGro"/>
                </div>
            </div>
            <nav id="div_bread">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Gmagro</a>
                    </li>
                    {foreach from=$smarty.session.navs key=k item=v}
                        <li class="breadcrumb-item active">
                            <a href="{$v}">{$k}</a>
                        </li>
                    {/foreach}

                </ol>
            </nav>
            <div class="row">
                <div id="div_menu" class="col-xl-2 col-md-3 col-sm-4 h-50">
                    <nav class="navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="?uc=intervenant&action=home"><i class="bi bi-door-open-fill"></i>Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?uc=intervenant&action=index"><i class="bi bi-people-fill"></i>Intervenants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="?uc=intervention&action=index"><i class="bi bi-wrench-adjustable"></i>Interventions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="?uc=csod&action=index"><i class="bi bi-command"></i>CSOD</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="?uc=machine&action=index"><i class="bi bi-device-ssd-fill"></i>Machines</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="?uc=stat&action=index"><i class="bi bi-pie-chart-fill"></i>Stats</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-10 col-md-9 col-sm-8">
                    <div id="div_action" class="row">
                        <h3 class="text-center">{block "action"}{/block}</h3>
                    </div>
                    <div>
                        <div id="div_contenu" class="row">
                        {block "contenu"}{/block}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>
</html>



