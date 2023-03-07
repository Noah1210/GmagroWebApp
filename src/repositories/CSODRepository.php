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

    public static function getCauseDefautByCode($code) {
        $sql = "SELECT cause_defaut.* 
                from cause_defaut
                where cause_defaut.site_uai =:site_uai or cause_defaut.site_uai is null and code=:code ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindParam(":code", $code);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetch();
        return $ligne;
    }

    public static function getCauseObjetByCode($code) {
        $sql = "SELECT cause_objet.* 
                from cause_objet
                where cause_objet.site_uai =:site_uai or cause_objet.site_uai is null and code=:code ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindParam(":code", $code);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetch();
        return $ligne;
    }

    public static function getSymptomeDefautByCode($code) {
        $sql = "SELECT symptome_defaut.* 
                from symptome_defaut
                where symptome_defaut.site_uai =:site_uai or symptome_defaut.site_uai is null and code=:code ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindParam(":code", $code);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetch();
        return $ligne;
    }

    public static function getSymptomeObjetByCode($code) {
        $sql = "SELECT symptome_objet.* 
                from symptome_objet
                where symptome_objet.site_uai =:site_uai or symptome_objet.site_uai is null and code=:code ";

        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindParam(":code", $code);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\CSOD');
        $ligne = $stmt->fetch();
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

    public static function updateCD($libelle, $code) {
        $sql = "update cause_defaut set libelle=:libelle , code=:code where code = :code and site_uai=:site_uai";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":libelle", $libelle);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindValue(":code", $code);
        return $stmt->execute();
    }

    public static function updateCO($libelle, $code) {
        $sql = "update cause_objet set libelle=:libelle , code=:code where code = :code and site_uai=:site_uai";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":libelle", $libelle);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindValue(":code", $code);
        return $stmt->execute();
    }

    public static function updateSO($libelle, $code) {
        $sql = "update symptome_objet set libelle=:libelle , code=:code where code = :code and site_uai=:site_uai";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":libelle", $libelle);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindValue(":code", $code);
        return $stmt->execute();
    }

    public static function updateSD($libelle, $code) {
        $sql = "update symptome_defaut set libelle=:libelle , code=:code where code = :code and site_uai=:site_uai";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":libelle", $libelle);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindValue(":code", $code);
        return $stmt->execute();
    }

    public static function addCSOD($code, $libelle, $type) {
        if ($type == 'CD') {
            $sql = "insert into cause_defaut(code,libelle,site_uai) values(:code,:libelle,:site_uai)";
        } elseif ($type == 'CO') {
            $sql = "insert into cause_objet(code,libelle,site_uai) values(:code,:libelle,:site_uai)";
        } elseif ($type == 'SO') {
            $sql = "insert into symptome_objet(code,libelle,site_uai) values(:code,:libelle,:site_uai)";
        } elseif ($type == 'SD') {
            $sql = "insert into symptome_defaut(code,libelle,site_uai) values(:code,:libelle,:site_uai)";
        }
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":libelle", $libelle);
        $stmt->bindValue(":code", $code);
        $stmt->bindParam(":site_uai", $_SESSION['admin']['site_uai']);
        return $stmt->execute();
    }

}
