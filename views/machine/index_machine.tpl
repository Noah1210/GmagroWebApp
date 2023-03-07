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

            {foreach $typeM as $t}
                <tr>
                    <th scope="row">1</th>
                    <td>{$t->getCode()}</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            {/foreach}
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

{/block}
