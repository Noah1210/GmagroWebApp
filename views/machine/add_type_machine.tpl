{* Smarty *}
{extends 'layout.tpl'}
{block titre}
    Types Machines
{/block}

{block action}
    Ajout d'un type de machine au site {$smarty.session.intervenant.site_uai}
{/block}

{block contenu}
    <form method="post" action="?uc=machine&action=addTypeMachine" class="row g-3" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input name="photo" class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-3"> 
            <input name="code" type="text" class="form-control" placeholder="Code">
           
        </div>
        <div class="mb-3">
            <input name="nom" type="text" class="form-control" placeholder="Nom du type machine">

        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <button onclick="window.location.href = '?uc=machine&action=index';" class="btn btn-primary">Annuler</button>
    </form>


{/block}
