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
    <div>
        <canvas id="tpsMachine"></canvas>
    </div>
    
    <div>
        <canvas id="tpsMachineInterv"></canvas>
        <select id="intervenant">
            {foreach $graph3 as $gr}
                <option value="{$gr.totalTimeSpent}">
                    {$gr.prenom}
                </option>
            {/foreach}
            
        </select>
    </div>

    <script>

        showGraph1();
        showGraph2();
        showGraph3();
        
        function showGraph3() {
            
            const ctx = document.getElementById('tpsMachineInterv');

            const myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
        
                    labels: [
                        "eyo"
                    ],
        
                    datasets: [
        
                        {
                            data: [
                                '10'
                            ],
                            hoverOffset: 4
                        }
        
                    ]

            }
            }

            );
            
            const intervenant = document.getElementById('intervenant');
            intervenant.addEventListener('change', intervenantTracker);
            function intervenantTracker(){
                console.log(intervenant.value);
                {*{foreach $graph3 as $gr}*}
                        myChart.data.datasets[0].data[0] = intervenant.value;
                        myChart.update();
                {*{/foreach}*}
            }
        }

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
            }
      
        
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

            }
            }

            );
        }
    </script>
{/block}
