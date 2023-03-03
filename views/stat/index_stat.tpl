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
    <div class="col-sm m-b-20">
            <canvas id="tpsInterv"></canvas>
        </div>
    
    <div class="row">
        <div class="col-sm mt-20">
            <canvas id="tpsMachine"></canvas>
        </div>

        <div class="col-sm">
            <canvas id="tpsMachineInterv"></canvas>
            <select id="intervenant">
                {foreach $intervenants as $interv}
                    <option {if $intervSel eq $interv.id} selected {/if} value="{$interv.id}">
                        {$interv.prenom}
                    </option>
                {/foreach}

            </select>
        </div>
                
        
    </div>
                <div class="col-sm">
            <canvas id="tpsIntervMachine"></canvas>
            <select id="machine">
                {foreach $machine as $ma}
                    <option {if $machineSel eq $ma.machine_code} selected {/if} value="{$ma.machine_code}">
                        {$ma.machine_code}
                    </option>
                {/foreach}

            </select>
        </div>

    <script>

        showGraph1();
        showGraph2();
        showGraph3();
        showGraph4();
        
        function showGraph3() {
            
            const ctx = document.getElementById('tpsMachineInterv');

            const myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
        
                    labels: [
                        {foreach $graph3 as $gr}
                            '{$gr.machine_code}',
                         {/foreach}
                    ],
        
                    datasets: [
        
                        {
                            data: [
                                {foreach $graph3 as $gr}
                                                            {$gr.totalTimeSpent},
                                {/foreach}
                                
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
                location.href = "?uc=stat&action=index&id="+intervenant.value;
                
            }
        }
        
        function showGraph4() {
            
            const ctx = document.getElementById('tpsIntervMachine');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Temps interventions par machines en minutes'],
                    datasets: [
        {foreach $graph4 as $gr}
                        {
                            label: '{$gr.prenom}',
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
{*            {$gr.totalTimeSpent}*}
            const machine = document.getElementById('machine');
            machine.addEventListener('change', machineTracker);
            function machineTracker(){
                location.href = "?uc=stat&action=index&code="+machine.value;
                
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
