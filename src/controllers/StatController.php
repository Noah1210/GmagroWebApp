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
        $this->smarty->display('stat/index_stat.tpl');
//        foreach ($graph as $gr) {
//            echo $gr['nom'];
//        }
    }

}
