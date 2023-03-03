<?php

namespace controllers;

class StatController extends IController {

    public function __construct($smarty) {
        parent::__construct($smarty);
    }

    public function run($action) {
        switch ($action) {
            case 'index':
                $this->run_index();
                break;
            default:
                $this->run_default_case("Stats", "?uc=stat&action=index");
        }
    }

    private function run_index() {
        $_SESSION['navs'] = ["Stats" => "?uc=stat&action=index"];

        $graph1 = \repositories\IntervenantRepository::getGraph1();
        $this->smarty->assign('graph1', $graph1);
        
        $graph2 = \repositories\IntervenantRepository::getGraph2();
        $this->smarty->assign('graph2', $graph2);
        
        $intervenants = \repositories\IntervenantRepository::getIntervenantIntervention();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        if(!$id){
            $id = '4';
        }
        $graph3 = \repositories\IntervenantRepository::getGraph3ByInterv($id);
        
        $machine = \repositories\IntervenantRepository::getMachine();
        $code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);
        if(!$code){
            $code = '3DMETAL1';
        }
        $graph4 = \repositories\IntervenantRepository::getGraph4ByMachine($code);
        
        $this->smarty->assign('intervenants', $intervenants);
        $this->smarty->assign('graph3', $graph3);
        
        $this->smarty->assign('machine', $machine);
        $this->smarty->assign('graph4', $graph4);
        
        $this->smarty->assign('machineSel', $code);
        $this->smarty->assign('intervSel', $id);
        $this->smarty->display('stat/index_stat.tpl');
//        foreach ($graph as $gr) {
//            echo $gr['nom'];
//        }
    }

}
