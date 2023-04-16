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

    public static function getTMachineBySite() {
        $sql = "SELECT type_machine.code,type_machine.nom,type_machine.photo,type_machine.site_uai 
                from type_machine
                left join machine on type_machine.code = machine.type_machine_code
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

    public static function addTMachines($code, $site_uai, $nom, $photo) {
        $sql = "insert into type_machine(code, nom,photo,site_uai)values(:code,:nom,:photo, :site_uai)";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":code", $code);
        $stmt->bindValue(":nom", $nom);
        $stmt->bindValue(":photo", $photo);
        $stmt->bindValue(":site_uai", $site_uai);
        return $stmt->execute();
        
    }

}
