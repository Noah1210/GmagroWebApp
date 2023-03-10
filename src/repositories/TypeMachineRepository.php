<?php

namespace repositories;

class TypeMachineRepository {

    public static function getTMachine() {
        $sql = "SELECT * 
                from type_machine
                inner join machine on type_machine.code = machine.type_machine_code
                where type_machine.site_uai =:site_uai ; ";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\TypeMachine');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }
    
    public static function getTMachineByCode($code) {
          $sql = "SELECT * 
                from type_machine
                where code=:code ; ";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":code", $code);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\TypeMachine');
        $ligne = $stmt->fetch();
        return $ligne;
    }

}
