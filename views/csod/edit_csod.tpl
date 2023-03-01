{* Smarty *}
{extends 'layout.tpl'}
{block titre}
    Editer CSOD
{/block}

{block action}
    
{/block}

{block contenu}
    <form method="post" action="?uc=intervention&action=getCommentaire&id={$intervention->getId()}">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label"> {$intervention->getActivite()->getLibelle()} numéro {$intervention->getId()} sur {$intervention->getMachine_code()} le {$intervention->getDh_debut()} </label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="nouveauComment" placeholder="{$intervention->getCommentaire()}">
            <br>
            <button type="submit" class="btn btn-primary">Mettre à jour</button> &nbsp;   
        </div>
    </form> 
    <div class="mb-3">     
        <button onclick="window.location.href = '?uc=csod&action=index';" class="btn btn-primary">Annuler</button>
    </div>




{/block}

