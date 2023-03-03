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
        $causedefauts = \repositories\CSODRepository::getCauseDefaut();
        $causeobjets = \repositories\CSODRepository::getCauseObjet();
        $symptomedefauts = \repositories\CSODRepository::getSymptomeDef();
        $symptomeobjets = \repositories\CSODRepository::getSymptomeObj();
        $this->smarty->assign('causedefauts', $causedefauts);
        $this->smarty->assign('causeobjets', $causeobjets);
        $this->smarty->assign('symptomedefauts', $symptomedefauts);
        $this->smarty->assign('symptomeobjets', $symptomeobjets);
        $this->smarty->display('csod/index_csod.tpl');
    }

    private function run_delete() {
        $code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);
        $delete = CSODRepository::deleteCD($code);
        $delete = CSODRepository::deleteCO($code);
        $delete = CSODRepository::deleteSD($code);
        $delete = CSODRepository::deleteSO($code);
        if ($delete) {
            header('Location: ?uc=csod&action=index');
        } else {
            $this->display_info("Problème de bdd", "L'csod  na pas pu être supprimé de la base", "index.php");
        }
    }

}
