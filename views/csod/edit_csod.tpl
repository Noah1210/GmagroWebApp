{* Smarty *}
{extends 'layout.tpl'}
{block titre}
    Editer CSOD
{/block}

{block action}

{/block}

{block contenu}

    <div class="mb-3">  
        <form method="post" action="?uc=csod&action=edit&type={$typeCSOD}">
            <div class="mb-3">
                <label for="inputPassword2" class="visually-hidden">Password</label>
                <input type="text" class="form-control" name="codeCD" value="{$CSOD->getCode()}">
            </div>
            <br>
            <div class="mb-3">
                <label for="inputPassword2" class="visually-hidden">Password</label>
                <input type="text" class="form-control" name="libCD" value="{$CSOD->getLibelle()}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Modifier</button>   
        </div>
        </form> 
        <br>
        
        <button onclick="window.location.href = '?uc=csod&action=index';" class="btn btn-primary">Annuler</button>
    </div>




{/block}

