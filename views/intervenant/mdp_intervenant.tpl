{* Smarty *}
{extends 'layout.tpl'}

{block titre}Mot de passe Gmagro{/block}

{block action}{$action} {/block}

{block contenu}
    <link rel="stylesheet" href="css/login_layout.css"/>
    <div class ="profile_wrapper"> 
        

    <form id="formProfile" action="?uc=intervenant&action=intervmdp&id={$id}" method="post">
        <div class="form_wrapper">
            <input type="password" id="password1" class="fadeIn second" value = "" name="password1" placeholder="Password 1" required>
            <input type="password" id="password2" class="fadeIn third" value = "" name="password2" placeholder="Password 2" required>
        </div>
    </form>
    <button class="btn btn-primary" id="buttonProfile" onclick="verifyPassword();" value="Change password">Modifier</button>
    <button class="btn btn-primary" id="buttonRetour" onclick="window.location.href='?uc=intervenant&action=index';" value="Change password">Retour</button>
    </div>

        
{/block}

