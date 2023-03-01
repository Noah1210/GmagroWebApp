<?php

namespace controllers;

use repositories\CSODRepository;

class CSODController extends IController {

    public function __construct($smarty) {
        parent::__construct($smarty);
    }

    public function run($action) {
        switch ($action) {
            case 'index':
                $this->run_index();
                break;
            case 'deleteCD':
                $this->run_delete();
                break;
            default:
                $this->run_default_case("CSOD", "?uc=csod&action=index");
        }
    }

    private function run_index() {
        $_SESSION['navs'] = ["CSOD" => "?uc=csod&action=index"];
        $causedefauts = \repositories\CSODRepository::getCauseDefaut($_SESSION['admin']['site_uai']);
        $causeobjets = \repositories\CSODRepository::getCauseObjet($_SESSION['admin']['site_uai']);
        $symptomedefauts = \repositories\CSODRepository::getSymptomeDef($_SESSION['admin']['site_uai']);
        $symptomeobjets = \repositories\CSODRepository::getSymptomeObj($_SESSION['admin']['site_uai']);
        $this->smarty->assign('causedefauts', $causedefauts);
        $this->smarty->assign('causeobjets', $causeobjets);
        $this->smarty->assign('symptomedefauts', $symptomedefauts);
        $this->smarty->assign('symptomeobjets', $symptomeobjets);
        $this->smarty->display('csod/index_csod.tpl');
    }

    private function run_delete() {

        $site_uai = filter_input(INPUT_GET, 'site_uai', FILTER_SANITIZE_STRING);
        if ($site_uai) {
            $delete = CSODRepository::deleteCD($site_uai);
            if ($delete) {
                $causedefauts = CSODRepository::getCauseDefaut($_SESSION['admin']['site_uai']);
                $this->smarty->assign('causedefauts', $causedefauts);
                $this->smarty->display('csod/index_csod.tpl');
            } else {
                $this->display_info("Problème de bdd", "L'intervenant na pas pu être supprimé de la base", "index.php");
            }
        } else {
            $this->display_info("Problème d'url", "L'intervenant na pas pu être supprimé", "index.php");
        }
    }

}
