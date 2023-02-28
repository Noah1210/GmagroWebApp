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
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>


                        </tr>
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
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>


                        </tr>
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
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>


                        </tr>
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
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>


                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

{/block}
