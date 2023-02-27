<?php

namespace repositories;

class InterventionRepository {

    public static function getInterventions($site_uai) {
        $sql = "SELECT intervention.* 
        FROM intervention 
	inner join intervenant on intervention.intervenant_id = intervenant.id 
        where site_uai = :site_uai
        
        ORDER BY dh_debut desc ;";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $site_uai);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Intervention');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }

    public static function deleteInterventions($id) {
        $sql = "delete from intervention  where id=:id";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":id", $id);
        $res = $stmt->execute();
        if ($res) {
            return $res;
        }
        $ligne = $stmt->fetch();
        return $ligne;
    }

}
