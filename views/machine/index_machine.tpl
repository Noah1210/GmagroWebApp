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
                        <img src="photos/{$m->getTypeMachine()->getPhoto()}"/>
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
    <button class="btn btn-primary" type="submit" style="width: 150px"><i class="bi bi-plus-circle"></i></button>
    <form>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"></label>
            <input type="text" class="form-control" style="width: 150px" name="code" placeholder="Code"> 
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"></label>
            <input type="text" class="form-control" style="width: 150px" name="serial" placeholder="Serial">
        </div>
        <select name ="type" class="form-select"style="width: 150px" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="SD">Machine</option>
                    <option value="SO">Type machine</option>
                </select>
                </select>
    </form>

{/block}
