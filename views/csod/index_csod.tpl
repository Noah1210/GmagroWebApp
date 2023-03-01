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
                                <td><i class="bi bi-pencil-square"></td>
                                <td>
                                    <a href="?uc=intervention&action=deleteCD&site_uai={$cf->getSite_uai()}"><i class="bi bi-trash3-fill"></i></a>
                                </td>

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
                                <td><i class="bi bi-pencil-square"></td>
                                <td><i class="bi bi-trash3-fill"></td>

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
                                <td><i class="bi bi-pencil-square"></td>
                                <td><i class="bi bi-trash3-fill"></td>

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
                                <td><i class="bi bi-pencil-square"></td>
                                <td><i class="bi bi-trash3-fill"></td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>

        </div>
    </div>

{/block}
