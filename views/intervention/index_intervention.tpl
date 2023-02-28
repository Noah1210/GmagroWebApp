{* Smarty *}
{extends 'layout.tpl'}
{block titre}
    Interventions
{/block}

{block action}
    Liste des interventions du site {$smarty.session.admin.site_uai}
{/block}

{block contenu}
    <table class="table">
        <thead>
            <tr>

                <th scope="col">Date</th>
                <th scope="col">Commentaire</th>
                <th scope="col">Activité</th>
                <th scope="col">Machine</th>
                <th scope="col">Supprimer</th>
                <th scope="col">Terminée</th>
            </tr>
        </thead>
        <tbody>
            {foreach $interventions as $inter}

                <tr>

                    <td>{$inter->getDh_debut()}</td>
                    <td class="text-center">{$inter->getCommentaire()} <a href="?uc=intervention&action=getCommentaire&id={$inter->getId()}"><i class="bi bi-pencil-square"></i></a></td>
                    <td>{$inter->getActivite()->getLibelle() }</td>
                    <td>{$inter->getMachine_code()}</td>
                    <td class="text-center">
                        {if $inter->getDh_debut()}
                            <a href="?uc=intervention&action=deleteInterv&id={$inter->getId()}"><i class="bi bi-trash3-fill"></i></a>


                        </td>
                    {else if $inter->getDh_fin()}
                        <td class="text-center"><i class="bi bi-check-lg"></i></a></td>
                    </tr>
                {/if}

            {/foreach}

        </tbody>
    </table>
{/block}
