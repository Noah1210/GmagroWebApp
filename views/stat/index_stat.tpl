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
        <canvas id="tpsInterv"></canvas>
    </div>
    <script>
        const ctx = document.getElementById('tpsInterv');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
{/block}
