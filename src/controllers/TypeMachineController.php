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
        }
    }

}
