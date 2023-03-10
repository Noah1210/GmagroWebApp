<?php

namespace repositories;

class MachineRepository {
 
    public static function getMachines() {
        $sql = "SELECT * 
                from  machine 
                where site_uai =:site_uai";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Machine');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }
    public static function deleteMachines($code) {
         $sql = "delete from machine  where code=:code";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":code", $code);
        return $stmt->execute();
    }
    
}
