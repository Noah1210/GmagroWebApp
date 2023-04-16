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
            case 'showTypeMachine':
                $this->run_showTMachines();
                break;
            case 'addTypeMachine':
                $this->run_addTMachines();
                break;
            default:
                $this->run_default_case("Machine", "?uc=machine&action=index");
        }
    }

    private function run_index() {
        $_SESSION['navs'] = ["Machines" => "?uc=machine&action=index"];
        $code = filter_input(INPUT_GET, 'codeMachine', FILTER_SANITIZE_STRING);
        if ($code != null) {
            $this->smarty->assign('codeMachine', $code);
        }
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

    private function run_showTMachines() {
        $this->smarty->display('machine/add_type_machine.tpl');
    }

    private function run_addTMachines() {
        $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $photoName = $_FILES['photo']['name'];
        $photo = $_FILES['photo']['tmp_name'];
        move_uploaded_file($photo, 'photos/' . $photoName);
        $site_uai = $_SESSION['admin']['site_uai'];

        $addTMachines = \repositories\TypeMachineRepository::addTMachines($code, $site_uai, $nom, $photoName);

        if ($addTMachines) {
            header('Location: ?uc=machine&action=index&codeMachine=' . $code);
        } else {
            $this->display_info("Problème d'url", "Le type machine n'a pas été ajouté.", "index.php");
        }
    }

}
