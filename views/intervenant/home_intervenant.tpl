{* Smarty *}
{extends 'layout.tpl'}

{block titre}Mon profil Gmao{/block}

{block action}{$action}{/block}

{block contenu} 
    <link rel="stylesheet" href="css/login_layout.css"/>
    <div class ="profile_wrapper">
    <h2>
    {$smarty.session.admin.prenom} {$smarty.session.admin.nom} ({$smarty.session.admin.mail})
    </h2>

    <form id="formProfile" action="?uc=intervenant&action=newpass" method="post">
        <div class="form_wrapper">
            <input type="password" id="password1" class="fadeIn second" value = "" name="password1" placeholder="Password 1" required>
            <input type="password" id="password2" class="fadeIn third" value = "" name="password2" placeholder="Password 2" required>
        </div>
    </form>
    <button class="btn btn-primary" id="buttonProfile" onclick="verifyPassword();" value="Change password">wow</button>
    </div>


{/block}

