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
            case 'deleteInterv':
                $this->run_delete();
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

    private function run_delete() {
        //$_SESSION['navs'] = ["Interventions" => "?uc=intervention&action=deleteInterv"];
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        echo "$id";
        if ($id) {
            $delete = InterventionRepository::deleteInterventions($id);
            if ($delete) {
                echo "$id";
                $interventions = InterventionRepository::getInterventions($_SESSION['admin']['site_uai']);
                $this->smarty->assign('interventions', $interventions);
                $this->smarty->display('intervention/index_intervention.tpl');
            } else {
                $this->display_info("Problème de bdd", "L'intervenant na pas pu être supprimé de la base", "index.php");
            }
        } else {
            $this->display_info("Problème d'url", "L'intervenant na pas pu être supprimé", "index.php");
        }
    }

}
