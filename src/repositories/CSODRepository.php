<?php

namespace repositories;

class CSODRepository {

    public static function getCauseDefaut($site_uai) {
        $sql = "SELECT cause_defaut.* 
                from cause_defaut
		inner join intervention on cause_defaut.code = intervention.cause_defaut_code
                inner join intervenant on intervention.intervenant_id = intervenant.id
                where cause_defaut.site_uai =:site_uai or cause_defaut.site_uai is null ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $site_uai);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }
    
     public static function getCauseObjet($site_uai) {
        $sql = "SELECT cause_objet.* 
                from cause_objet
		inner join intervention on cause_objet.code = intervention.cause_objet_code
                inner join intervenant on intervention.intervenant_id = intervenant.id
                where cause_objet.site_uai =:site_uai or cause_objet.site_uai is null ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $site_uai);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }
     public static function getSymptomeDef($site_uai) {
        $sql = "SELECT symptome_defaut.* 
                from symptome_defaut
		inner join intervention on symptome_defaut.code = intervention.symptome_defaut_code
                inner join intervenant on intervention.intervenant_id = intervenant.id
                where symptome_defaut.site_uai =:site_uai or symptome_defaut.site_uai is null ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $site_uai);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }
    public static function getSymptomeObj($site_uai) {
        $sql = "SELECT symptome_objet.* 
                from symptome_objet
		inner join intervention on symptome_objet.code = intervention.symptome_objet_code
                inner join intervenant on intervention.intervenant_id = intervenant.id
                where symptome_objet.site_uai =:site_uai or symptome_objet.site_uai is null ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $site_uai);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }
     public static function deleteCD($site_uai) {
        $sql = "delete from cause_defaut  where site_uai=:site_uai;";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $site_uai);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }
    
    
    

}
