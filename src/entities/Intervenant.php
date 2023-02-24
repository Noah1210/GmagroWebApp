<?php

namespace entities;

class Intervenant {

    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $password;
    private $actif;
    private $role_code;
    private $site_uai;

    function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole_code() {
        return $this->role_code;
    }

    function isActif() {
        return $this->actif;
    }

    function getSite_uai() {
        return $this->site_uai;
    }

    public function __toString() {
        return (string) $this->nom . " " + $this . $this->prenom;
    }

}
