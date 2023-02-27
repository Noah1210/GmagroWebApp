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
                <th scope="col">Terminer</th>
            </tr>
        </thead>
        <tbody>
              {foreach $interventions as $inter}
                        
                            <tr>
                                
                                <td>{$inter->getDh_debut()}</td>
                                <td>{$inter->getCommentaire()}</td>
                                <td>{$inter->getActivite()->getLibelle() }</td>
                                <td>{$inter->getMachine_code()}//</td>
                                
                            </tr>
                     
                    {/foreach}
            
        </tbody>
    </table>
{/block}
