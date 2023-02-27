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
                        <th scope="col">Prédnom</th>
                        <th class="text-center" scope="col">Edit</th>
                        <th class="text-center" scope="col">Mail</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $intervenants as $inter}
                        {if $inter->getRole_code() eq 'Utilisateur'}
                            <tr>
                                <th scope="row">{$inter->getId()}</th>
                                <td>{$inter->getNom()}</td>
                                <td>{$inter->getPrenom()}</td>
                                <td class="text-center"><a href="?uc=intervenant&action=intervmdp&nom={$inter->getNom()}&prenom={$inter->getPrenom()}&id={$inter->getId()}"><i class="bi bi-pen"></i></a></td>
                                <td class="text-center"><a href="?uc=intervenant&action=mailInterv&mail={$inter->getMail()}&nom={$inter->getNom()}&prenom={$inter->getPrenom()}"><i class="bi bi-envelope"></i></a></td>
                                        {if $inter->isActif() eq 1}
                                    <td class="text-center"><a href="?uc=intervenant&action=disableinterv&id={$inter->getId()}"><i class="bi bi-slash-circle"></i></a></td>
                                        {else}
                                    <td class="text-center"><a href="?uc=intervenant&action=enableinterv&id={$inter->getId()}"><i class="bi bi-check-lg"></i></a></td>
                                        {/if}
                                <td class="text-center"><a href="?uc=intervenant&action=deleteInterv&id={$inter->getId()}"><i class="bi bi-trash3-fill"></i></a></td>
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

            <form class="form-horizontal" action="?uc=intervenant&action=importInterv" method="post" name="upload_excel" enctype="multipart/form-data">
                <h3>Import/Export</h3>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">Select File</label>
                    <div class="col-md-4">
                        <input type="file" name="file" id="file" class="input-large" accept=".csv">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Importer intervenants</label>
                    <div class="col-md-4">
                        <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                    </div>
                </div>
            </form>

            <form class="form-horizontal" action="?uc=intervenant&action=exportInterv" method="post" name="upload_excel"   
                  enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="submit" name="Export" class="btn btn-success" value="export en excel"/>
                    </div>
                </div>                    
            </form>    


        </div>
        <link rel="stylesheet" href="css/intervenant_index.css"/>
        <div class="intervenant_container">
            <h2>Ajouter un intervenant <i class="bi bi-person-fill-add"></i></h2>
            <form class="" id="formProfile" action="?uc=intervenant&action=addinterv" method="post">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="nom" name="nom" value = "" placeholder="Nom" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="prenom" name="prenom" value = "" placeholder="Prénom" required>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" id="mail" name="mail" value = "" placeholder="Mail" required>
                </div>
                <div class="form-row ">
                    <div class="form-group col-md-6">
                        <input type="password" id="password1" class="form-control" value = "" name="password1" placeholder="Password 1" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="password" id="password2" class="form-control" value = "" name="password2" placeholder="Password 2" required>
                    </div>
                </div>

                <div class="checkbox_wrapp">
                    <input  type="checkbox" checked="true" id="checkActive" value="1" name="checkActive"> Compte actif
                    <input type="checkbox" id="checkAdmin" value="Admin" name="checkAdmin"> Administrateur
                </div>
            </form>
            <button class="btn btn-primary" id="buttonProfile" onclick="verifyPassword();" value="Change password">wow</button>

        </div> 
    </div>
{/block}
