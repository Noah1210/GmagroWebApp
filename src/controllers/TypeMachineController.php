<?php

namespace controllers;

use repositories\TypeMachineRepository;

class TypeMachineController extends IController {

    public function __construct($smarty) {
        parent::__construct($smarty);
    }

    public function run($action) {
        switch ($action) {

            case 'index':
                $this->run_index();
                break;
            default:
                $this->run_default_case("TypeMachine", "?uc=machine&action=index");
        }
    }

    private function run_index() {
        $_SESSION['navs'] = ["TypeMachine" => "?uc=machine&action=index"];
        $typeM = \repositories\TypeMachineRepository::getTMachine();

        $this->smarty->assign('typeM', $typeM);
        $this->smarty->display('machine/index_machine.tpl');
    }

}
