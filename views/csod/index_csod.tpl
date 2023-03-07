{* Smarty *}
{extends 'layout.tpl'}
{block titre}
    CSOD
{/block}

{block action}
    Liste des CSOD du site {$smarty.session.admin.site_uai}
{/block}

{block contenu}
    <div class="container text-center">
        <div class="row">
            <div class="col">
                Cause défaut
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Libelle</th>
                            <th scope="col">Editer</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $causedefauts as $cf}
                            <tr>
                                <th scope="row">{$cf->getCode()}</th>
                                <td>{$cf->getLibelle()}</td>
                                {if $cf->isEditable()}
                                    <td>
                                        <a href="?uc=csod&action=edit&type=CD&code={$cf->getCode()}"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                    <td>

                                        <a href="?uc=csod&action=deleteCSOD&code={$cf->getCode()}"><i class="bi bi-trash3-fill"></i></a>

                                    </td>
                                {/if}
                            </tr>

                        {/foreach}
                    </tbody>
                </table>
            </div>
            <div class="col">
                Cause objet
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Libelle</th>
                            <th scope="col">Editer</th>
                            <th scope="col">Supprimer</th>

                        </tr>
                    </thead>
                    <tbody>
                        {foreach $causeobjets as $co}
                            <tr>
                                <th scope="row">{$co->getCode()}</th>
                                <td>{$co->getLibelle()}</td>
                                {if $co->isEditable()} 
                                    <td>

                                        <a href="?uc=csod&action=edit&type=CD&code={$co->getCode()}"><i class="bi bi-pencil-square"></a></td>
                                    <td>

                                        <a href="?uc=csod&action=deleteCSOD&code={$co->getCode()}"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                {/if}


                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>

        </div>
        <div class="row">
            <div class="col">
                Symptome défaut
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Libelle</th>
                            <th scope="col">Editer</th>
                            <th scope="col">Supprimer</th>

                        </tr>
                    </thead>
                    <tbody>
                        {foreach $symptomedefauts as $sd}
                            <tr>
                                <th scope="row">{$sd->getCode()}</th>
                                <td>{$sd->getLibelle()}</td>
                                {if $sd->isEditable()} 
                                    <td>
                                        <a href="?uc=csod&action=edit&type=SD&code={$sd->getCode()}"><i class="bi bi-pencil-square"></a></td>
                                    <td>
                                        <a href="?uc=csod&action=deleteCSOD&code={$sd->getCode()}"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                {/if}
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
            <div class="col">
                Symptome objet
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Libelle</th>
                            <th scope="col">Editer</th>
                            <th scope="col">Supprimer</th>

                        </tr>
                    </thead>
                    <tbody>
                        {foreach $symptomeobjets as $so}
                            <tr>
                                <th scope="row">{$so->getCode()}</th>
                                <td>{$so->getLibelle()}</td>
                                <td>
                                    {if $so->isEditable()} 
                                        <a href="?uc=csod&action=edit&type=SO&code={$so->getCode()}"><i class="bi bi-pencil-square"></a></td>
                                    </td>
                                    <td>
                                        <a href="?uc=csod&action=deleteCSOD&code={$so->getCode()}"><i class="bi bi-trash3-fill"></i></a>
                                    </td>
                                {/if}
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
            <form method="post" action="?uc=csod&action=add">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"></label>
                    <input type="text" class="form-control" name="code" placeholder="ENtrer le code"> 
                </div>


                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"></label>
                    <input type="text" class="form-control" name="libelle" placeholder="ENtrer le libellé">
                </div>

                <select name ="typeCSOD" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="CD">Cause defaut</option>
                    <option value="CO">Cause objet</option>
                    <option value="SD">Symptome defaut</option>
                    <option value="SO">Symptome objet</option>
                </select>
                <button type="submit" class="btn btn-primary">Ajouter CSOD</button>
            </form>

        </div>  
    </div>


{/block}
