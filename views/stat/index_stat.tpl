{* Smarty *}
{extends 'layout.tpl'}
{block titre}
    Stats
{/block}

{block action}
    Statistiques du site {$smarty.session.admin.site_uai}
{/block}

{block contenu}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div>
        <canvas id="myChart"></canvas>
    </div>
{/block}
