<?php

namespace repositories;

class CSODRepository {
    public static function getCauseDefaut($site_uai) {
        $sql = "SELECT cause_defaut.* ,
        from cause_defaut
	inner join intervenant on intervention.intervenant_id = intervenant.id 
        where site_uai = :site_uai       
        ORDER BY dh_debut desc ;";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $site_uai);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }
    
}
