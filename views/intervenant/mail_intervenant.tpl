{* Smarty *}
{extends 'layout.tpl'}

{block titre}Contact Gmagro{/block}

{block action}{$action} {/block}

{block contenu} 
    <link rel="stylesheet" href="css/intervenant_index.css"/>
    <div>
        <form id="formMail" action="?uc=intervenant&action=mailInterv" method="post">
            <div class="form-group col-md-4">
                <label for="mailAdress">Email address </label>
                <input type="email" class="form-control " id="mailAdress" name="destinataire" value="{$mail}">
            </div>
            <div class="form-group">
                <label for="mailSujet">Sujet</label>
                <input type="text" class="form-control " id="mailSujet" name="sujet" placeholder="Sujet du message">
            </div>
            <div class="form-group">
                <label for="mailText">Message</label>
                <textarea class="form-control" id="mailText" name="message" rows="9"></textarea>
            </div>
        </form>
        <button type="submit" form="formMail" class="btn btn-primary btnmail" id="buttonMail">Envoyer</button>
        <button class="btn btn-primary" id="buttonRetour" onclick="window.location.href = '?uc=intervenant&action=index';">Retour</button>
    </div>
{/block}

