<?php

namespace controllers;

class MachineController extends IController {

    public function __construct($smarty) {
        parent::__construct($smarty);
    }

    public function run($action) {
        switch ($action) {
            case 'index':
                $this->run_index();
                break;
            case 'delete':
                $this->run_delete();
                break;
            case 'addMachines':
                $this->run_add();
                break;
            default:
                $this->run_default_case("Machine", "?uc=machine&action=index");
        }
    }

    private function run_index() {
        $_SESSION['navs'] = ["Machines" => "?uc=machine&action=index"];
        $machines = \repositories\MachineRepository::getMachines();
        $this->smarty->assign('machines', $machines);
        $typeMachines = \repositories\TypeMachineRepository::getTMachineBySite();
        $this->smarty->assign('typeMachines', $typeMachines);
        $this->smarty->display('machine/index_machine.tpl');
    }

    private function run_delete() {
        $code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);
        $delete = \repositories\MachineRepository::deleteMachines($code);
        if ($delete) {
            header('Location: ?uc=machine&action=index');
        } else {
            $this->display_info("Problème de bdd", "La machine na pas pu être supprimé de la base", "index.php");
        }
    }

    private function run_add() {
        $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
        $serial = filter_input(INPUT_POST, 'serial', FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        $typeMachine = filter_input(INPUT_POST, 'typeMachine', FILTER_SANITIZE_STRING);
        $site_uai = $_SESSION['admin']['site_uai'];

        $addMachines = \repositories\MachineRepository::addMachines($code, $site_uai, $date, $serial, $typeMachine);
        if ($addMachines) {
            header('Location: ?uc=machine&action=index');
        } else {
            $this->display_info("Problème d'url", "La machine n'a pas été ajouté.", "index.php");
        }
    }

}
