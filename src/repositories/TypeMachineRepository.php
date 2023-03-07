<?php

namespace repositories;

class TypeMachineRepository {

    public static function getTMachine() {
        $sql = "SELECT type_machine.* 
                from type_machine
                where type_machine.site_uai =:site_uai ";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\TypeMachine');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }

}
