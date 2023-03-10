<?php

namespace entities;

class Machine {

    private $code;
    private $site_uai;
    private $date_fabrication;
    private $numero_serie;
    private $type_machine_code;

    function __construct() {
        
    }

    public function getCode() {
        return $this->code;
    }

    public function getSite_uai() {
        return $this->site_uai;
    }

    public function getDate_fabrication() {
        return $this->date_fabrication;
    }

    public function getNumero_serie() {
        return $this->numero_serie;
    }

    public function getType_machine_code() {
        return $this->type_machine_code;
    }
    public function getTypeMachine() {
        return \repositories\TypeMachineRepository::getTMachineByCode($this->type_machine_code);
    }

}
