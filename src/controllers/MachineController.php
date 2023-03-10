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
            case 'add':
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

//    private function run_add() {
//        $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
//        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
//        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING);
//        $password = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING);
//        $actif = filter_input(INPUT_POST, 'checkActive', FILTER_SANITIZE_STRING);
//        $role = filter_input(INPUT_POST, 'checkAdmin', FILTER_SANITIZE_STRING);
//        if (!$actif) {
//            $actif = "0";
//        }
//        if (!$role) {
//            $role = 'Utilisateur';
//        }
//        if ($mail) {
//            $addInterv = IntervenantRepository::addinterv($nom, $prenom, $mail, $password, $actif, $role);
//            if ($addInterv) {
//                $intervenants = IntervenantRepository::getAll();
//                $this->smarty->assign('intervenants', $intervenants);
//                $this->smarty->display('intervenant/index_intervenant.tpl');
//            } else {
//                $this->display_info("Problème de bdd", "L'intervenant na pas pu être ajouté à la base", "index.php");
//            }
//        } else {
//            $this->display_info("Problème d'url", "L'intervenant na pas pu être ajouté", "index.php");
//        }
}
