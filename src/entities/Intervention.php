<?php

namespace entities;

class Intervention {

    private $id;
    private $dh_debut;
    private $dh_fin;
    private $commentaire;
    private $temps_arret;
    private $changement_organe;
    private $perte;
    private $dh_creation;
    private $dh_derniere_maj;
    private $intervenant_id;
    private $activite_code;
    private $machine_code;
    private $cause_defaut_code;
    private $cause_objet_code;
    private $symptome_defaut_code;
    private $symptome_objet_code;

    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getDh_debut() {
        return $this->dh_debut;
    }

    public function getDh_fin() {
        return $this->dh_fin;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function getTemps_arret() {
        return $this->temps_arret;
    }

    public function getChangement_organe() {
        return $this->changement_organe;
    }

    public function getPerte() {
        return $this->perte;
    }

    public function getDh_creation() {
        return $this->dh_creation;
    }

    public function getDh_derniere_maj() {
        return $this->dh_derniere_maj;
    }

    public function getIntervenant_id() {
        return $this->intervenant_id;
    }

    public function getActivite_code() {
        return $this->activite_code;
    }

    public function getMachine_code() {
        return $this->machine_code;
    }

    public function getCause_defaut_code() {
        return $this->cause_defaut_code;
    }

    public function getCause_objet_code() {
        return $this->cause_objet_code;
    }

    public function getSymptome_defaut_code() {
        return $this->symptome_defaut_code;
    }

    public function getSymptome_objet_code() {
        return $this->symptome_objet_code;
    }
    public function getActivite() {
        return \repositories\ActiviteRepository::getActivite($this->activite_code);
    }

    
   
    
}
