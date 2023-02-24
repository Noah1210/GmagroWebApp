{* Smarty *}
{extends 'layout.tpl'}
{block titre}
    Intervenants Gmagro
{/block}

{block action}
    Liste des intervenants du site {$smarty.session.admin.site_uai}
{/block}

{block contenu}
    <div class="row">
        <div class="col">
            <h5>Utilisateurs</h5>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $intervenants as $inter}
                        {if $inter->getRole_code() eq 'Utilisateur'}
                            <tr>
                                <th scope="row">{$inter->getId()}</th>
                                <td>{$inter->getNom()}</td>
                                <td>{$inter->getPrenom()}</td>
                            </tr>
                        {/if}
                    {/foreach}
                </tbody>
            </table>
        </div>
        <div class="col">
            <h5>Administrateurs</h5>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $intervenants as $inter}
                        {if $inter->getRole_code() eq 'Admin' or $inter->getRole_code() eq 'SuperAdmin' }
                            <tr>
                                <th scope="row">{$inter->getId()}</th>
                                <td>{$inter->getNom()}</td>
                                <td>{$inter->getPrenom()}</td>
                            </tr>
                        {/if}
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
{/block}
