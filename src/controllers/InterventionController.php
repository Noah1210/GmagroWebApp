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
            case 'getCommentaire':
                $nouveauComment = filter_input(INPUT_POST, 'nouveauComment', FILTER_SANITIZE_STRING);
                if ($nouveauComment) {
                    $this->run_updateCom($nouveauComment);
                } else {
                    $this->run_getCom();
                }
                break;
            
//            case 'annulerCommentaire':
//                $this->run_retour();
//                break;
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

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        if ($id) {
            $delete = InterventionRepository::deleteInterventions($id);
            if ($delete) {
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

    private function run_getCom() {
        $idInterv = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $_SESSION['navs'] = ["Interventions" => "?uc=intervention&action=index"];
        $intervention = \repositories\InterventionRepository::getById($idInterv);
        $this->smarty->assign('intervention', $intervention);
        $this->smarty->display('intervention/comment_intervention.tpl');
    }

    private function run_updateCom($nouveauComment) {
        $idInterv = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $_SESSION['navs'] = ["Interventions" => "?uc=intervention&action=index"];
        $intervention = \repositories\InterventionRepository::updateCom($idInterv, $nouveauComment);
        header('Location: ?uc=intervention&action=index');
    }

    

}
