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
            default:
                $this->run_default_case("Machine", "?uc=machine&action=index");
        }
    }

    private function run_index() {
        $_SESSION['navs'] = ["Machines" => "?uc=machine&action=index"];
        $this->smarty->display('machine/index_machine.tpl');
    }

}
