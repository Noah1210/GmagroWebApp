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

    function setCode($code): void {
        $this->code = $code;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setPhoto($photo): void {
        $this->photo = $photo;
    }

    function setSite_uai($site_uai): void {
        $this->site_uai = $site_uai;
    }


}
