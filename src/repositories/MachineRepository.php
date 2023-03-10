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

    public static function addMachines($code, $site_uai, $date_fabrication, $numero_serie, $type_machine_code) {
        $sql = "insert into machine(code, site_uai,date_fabrication,numero_serie,type_machine_code)values(:code, :site_uai, :date_fabrication, :numero_site,:type_machine_code)";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":code", $code);
        $stmt->bindValue(":site_uai", $site_uai);
        $stmt->bindValue(":date_fabrication", $date_fabrication);
        $stmt->bindValue(":numero_site", $numero_serie);
        $stmt->bindValue(":type_machine_code", $type_machine_code);

        return $stmt->execute();
    }

}
