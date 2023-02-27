<?php

namespace controllers;
use repositories\InterventionRepository;

class InterventionController extends IController {

    public function __construct($smarty) {
        parent::__construct($smarty);
    }

    public function run($action) {
        switch ($action) {
            case 'index':
                $this->run_index();
                break;
            default:
                $this->run_default_case("Intervention", "?uc=intervention&action=index");
        }
    }

    private function run_index() {
        $_SESSION['navs'] = ["Interventions" => "?uc=intervention&action=index"];
        $interventions = \repositories\InterventionRepository::getInterventions($_SESSION['admin']['site_uai']);
        $this->smarty->assign('interventions', $interventions);
        $this->smarty->display('intervention/index_intervention.tpl');
    }

}
