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
        <canvas id="tpsMachine"></canvas>
    </div>

    <script>

        showGraph1();
        showGraph2();

        function showGraph1() {
            const ctx = document.getElementById('tpsInterv');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Temps interventions en minutes'],
                    datasets: [
        {foreach $graph1 as $gr}
                        {
                            label: '{$gr.prenom} {$gr.nom}',
                            data: [{$gr.totalTimeSpent}],
                            borderWidth: 1
                        },
        {/foreach}
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            }

            );
      
        
        function showGraph2() {
            const ctx = document.getElementById('tpsMachine');

            new Chart(ctx, {
                type: 'doughnut',
                data: {
        
                    labels: [
                        {foreach $graph2 as $gr}
                                    '{$gr.machine_code}',
                                {/foreach}
                    ],
        
                    datasets: [
        
                        {
                            data: [
                                {foreach $graph2 as $gr}
                                    {$gr.totalTimeSpent},
                                {/foreach}
                            ],
                            hoverOffset: 4
                        }
        
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            }

            );
        }
    </script>
{/block}
