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
        $sql = "delete from intervention_intervenant  where intervention_id=:id";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":id", $id);
        $res = $stmt->execute();

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

    /**
     * 
     * @param int $id
     * @return Intervention
     */
    public static function getById($id) {
        $sql = "SELECT * FROM intervention where id = :id";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Intervention');
        $ligne = $stmt->fetch();
        return $ligne;
    }

    public static function updateCom($id, $commentaire) {
        $sql = "update intervention set commentaire=:commentaire where id = :id";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":commentaire", $commentaire);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Intervention');
        $ligne = $stmt->fetch();
        return $ligne;
    }

}
