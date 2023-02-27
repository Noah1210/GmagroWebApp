<?php

namespace entities;

class TypeMachine {

    private $code;
    private $nom;
    private $photo;
    private $site_uai;

    function __construct() {
        
    }
    public function getCode() {
        return $this->code;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getSite_uai() {
        return $this->site_uai;
    }


}
