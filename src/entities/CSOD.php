<?php

namespace entities;

class CSOD {
    private $code ;
    private $libelle ;
    private $site_uai ;
    
    function __construct() {
        
    }
    function getCode() {
        return $this->code;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function getSite_uai() {
        return $this->site_uai;
    }

    function setCode($code): void {
        $this->code = $code;
    }

    function setLibelle($libelle): void {
        $this->libelle = $libelle;
    }

    function setSite_uai($site_uai): void {
        $this->site_uai = $site_uai;
    }


    

}
