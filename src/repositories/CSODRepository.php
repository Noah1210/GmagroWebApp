<?php

namespace repositories;

class CSODRepository {

    public static function getCauseDefaut() {
        $sql = "SELECT cause_defaut.* 
                from cause_defaut
                where cause_defaut.site_uai =:site_uai or cause_defaut.site_uai is null ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }

    public static function getCauseObjet() {
        $sql = "SELECT cause_objet.* 
                from cause_objet
                where cause_objet.site_uai =:site_uai or cause_objet.site_uai is null ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }

    public static function getSymptomeDef() {
        $sql = "SELECT symptome_defaut.* 
                from symptome_defaut
                where symptome_defaut.site_uai =:site_uai or symptome_defaut.site_uai is null ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }

    public static function getSymptomeObj() {
        $sql = "SELECT symptome_objet.* 
                from symptome_objet
                where symptome_objet.site_uai =:site_uai or symptome_objet.site_uai is null ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }

    public static function deleteCD($code) {
        $sql = "delete from cause_defaut  where code=:code and site_uai=:site_uai;";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindParam(":code", $code);
        return $stmt->execute();
    }
    public static function deleteCO($code) {
        $sql = "delete from cause_objet  where code=:code and site_uai=:site_uai;";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindParam(":code", $code);
        return $stmt->execute();
    }
    public static function deleteSO($code) {
        $sql = "delete from symptome_objet  where code=:code and site_uai=:site_uai;";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindParam(":code", $code);
        return $stmt->execute();
    }
    public static function deleteSD($code) {
        $sql = "delete from symptome_defaut where code=:code and site_uai=:site_uai;";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindParam(":code", $code);
        return $stmt->execute();
    }

}
