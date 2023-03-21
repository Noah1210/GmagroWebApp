{* Smarty *}
{extends 'layout.tpl'}
{block titre}
    Machines
{/block}

{block action}
    Liste des machines du site {$smarty.session.admin.site_uai}
{/block}

{block contenu}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">Code</th>
                <th scope="col">Date fabrication</th>
                <th scope="col">Serial</th>
                <th scope="col">Type</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>

            {foreach $machines as $m}
                <tr>

                    <td>
                        <img class ="photos-machines" width="120px" src="photos/{$m->getTypeMachine()->getPhoto()}"/>
                    </td>
                    <td>{$m->getCode()}</td>
                    <td>{$m->getDate_fabrication()}</td>
                    <td>{$m->getNumero_serie()}</td>
                    <td>{$m->getTypeMachine()->getNom()}</td>
                    <td class="text-center">
                        <a href="?uc=machine&action=delete&code={$m->getCode()}"><i class="bi bi-trash3-fill"></i></a>
                    </td>

                </tr>
            {/foreach}
        </tbody>

    </table>  
    <div class="col-auto"> 
      <a  class="btn btn-primary" href="?uc=machine&action=showTypeMachine"><i class="bi bi-plus-circle"> Ajouter type machine</i></a>
    </div>
        <form method="post" action="?uc=machine&action=addMachines" class="row g-3">
        <div class="col-auto">
            <label class="visually-hidden"></label>
            <input type="text"  class="form-control" name="code" placeholder="Code">
        </div>
        <div class="col-auto">
            <label  class="visually-hidden"></label>
            <input type="date" class="form-control" name="date" placeholder="Date">
        </div>
        <div class="col-auto">
            <label class="visually-hidden"></label>
            <input type="text" class="form-control" name ="serial" placeholder="Serial">
        </div>
        <div class="col-auto">
            <select name ="typeMachine" class="form-select" aria-label="Default select example">
                {foreach $typeMachines as $typeM}
                    <option value="{$typeM->getCode()}">{$typeM->getNom()}</option>
                {/foreach}
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Valider</button>
        </div>

    </form>

{/block}
