<?php

namespace controllers;

class TypeMachineController extends IController {

    public function __construct($smarty) {
        parent::__construct($smarty);
    }

    public function run($action) {
        switch ($action) {
            default:
                $this->run_default_case("TypeMachine", "?uc=machine&action=index");
            case 'index':
                $this->run_index();
                break;
        }
    }

    private function run_index() {
        $_SESSION['navs'] = ["CSOD" => "?uc=machine&action=index"];
        $typeM = \repositories\TypeMachineRepository::getTMachine();
        foreach ($typeM as $t) {
            echo "{$t->getCode()}";
        }
        $this->smarty->assign('typeM', $typeM);
        $this->smarty->display('machine/index_machine.tpl');
    }

}
