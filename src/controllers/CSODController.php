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
            case 'edit':
                $this->run_edit();
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

    private function run_edit() {
        $code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
        $newCode = filter_input(INPUT_POST, 'codeCD', FILTER_SANITIZE_STRING);
        $newLib = filter_input(INPUT_POST, 'libCD', FILTER_SANITIZE_STRING);
        if ($newCode && $newLib) {
            switch ($type) {
                case 'CD':
                    $res = \repositories\CSODRepository::updateCD($newLib, $newCode);
                    break;
                case 'CO':
                    $res = \repositories\CSODRepository::updateCO($newLib, $newCode);
                    break;
                case 'SO':
                    $res = \repositories\CSODRepository::updateSO($newLib, $newCode);
                    break;
                case 'SD':
                    $res = \repositories\CSODRepository::updateSD($newLib, $newCode);
                    break;
            }

            if ($res) {
                header('Location: ?uc=csod&action=index');
            } else {
                $this->display_info("Modification CSOD", "Erreur dans la mise à jour", '?uc=csod&action=index');
            }
        } else {
            $_SESSION['navs'] = ["CSOD" => "?uc=csod&action=edit"];
            switch ($type) {
                case 'CD':
                    $CSOD = \repositories\CSODRepository::getCauseDefautByCode($code);
                    $this->smarty->assign('typeCSOD', "CD");
                    break;
                case 'CO':
                    $CSOD = \repositories\CSODRepository::getCauseObjetByCode($code);
                    $this->smarty->assign('typeCSOD', "CO");
                    break;
                case 'SO':
                    $CSOD = \repositories\CSODRepository::getSymptomeObjetByCode($code);
                    $this->smarty->assign('typeCSOD', "SO");
                    break;
                case 'SD':
                    $CSOD = \repositories\CSODRepository::getSymptomeDefautByCode($code);
                    $this->smarty->assign('typeCSOD', "SD");
                    break;
            }

            $this->smarty->assign('CSOD', $CSOD);
            $this->smarty->display('csod/edit_csod.tpl');
        }
    }

}
