<?php

namespace repositories;

class InterventionRepository {

    public static function getInterventions($site_uai) {
        $sql = "SELECT * 
        FROM intervention 
	inner join intervenant on intervention.intervenant_id = intervenant.id 
        where site_uai = :site_uai
        
        ORDER BY dh_debut desc ;";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $st->bindParam(":site_uai", $site_uai);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Intervention');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }

    public static function deleteInterventions($id) {
        $sql = "delete from Intervention where id=:id";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $st->bindParam(":id", $id);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Intervention');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }

}
