<?php

namespace controllers;

class StatController extends IController {

    public function __construct($smarty) {
        parent::__construct($smarty);
    }

    public function run($action) {
        switch ($action) {
            case 'index':
                $this->run_index();
                break;
            default:
                $this->run_default_case("Stats", "?uc=stat&action=index");
        }
    }

    private function run_index() {
        $_SESSION['navs'] = ["Stats" => "?uc=stat&action=index"];
        $this->smarty->display('stat/index_stat.tpl');
    }

}
