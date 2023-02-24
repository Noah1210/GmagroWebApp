<?php

namespace controllers;

class CSODController extends IController {

    public function __construct($smarty) {
        parent::__construct($smarty);
    }

    public function run($action) {
        switch ($action) {
            case 'index':
                $this->run_index();
                break;
            default:
                $this->run_default_case("CSOD", "?uc=csod&action=index");
        }
    }

    private function run_index() {
        $_SESSION['navs'] = ["CSOD" => "?uc=csod&action=index"];
        $this->smarty->display('csod/index_csod.tpl');
    }

}
