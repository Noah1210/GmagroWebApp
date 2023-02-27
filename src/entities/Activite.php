<?php

namespace entities;

class Activite {

    private $code;
    private $libelle;

    function __construct() {
        
    }

    public function getCode() {
        return $this->code;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setCode($code): void {
        $this->code = $code;
    }

    public function setLibelle($libelle): void {
        $this->libelle = $libelle;
    }

}
