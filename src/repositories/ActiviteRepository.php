<?php

namespace repositories;

class ActiviteRepository {

    public static function getActivite($code) {
        $sql = "SELECT * 
        FROM activite      
        where code = :code ;";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $st->bindParam(":code", $code);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Activite');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }

}
