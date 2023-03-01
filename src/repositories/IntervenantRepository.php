<?php

namespace repositories;

use entities\Intervenant;
use repositories\PdoBD;

class IntervenantRepository {

    /**
     * 
     * @param string $mail
     * @param string $password
     * @return Intervenant
     */
    public static function auth($mail, $password) {
        $sql = "SELECT id,nom,prenom,mail,actif,role_code,site_uai FROM intervenant where mail=:mail and `password`=md5(:password) and role_code in('Admin','SuperAdmin')";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":mail", $mail);
        $stmt->bindValue(":password", $password);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Intervenant');
        $ligne = $stmt->fetch();
        return $ligne;
    }

    /**
     * 
     * @param string $site_uai
     * @return Intervenant[]
     */
    public static function getAll() {
        $sql = "SELECT id,nom,prenom,mail,actif,role_code,site_uai FROM intervenant where site_uai=:site_uai";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Intervenant');
        $ligne = $stmt->fetchAll();
        return $ligne;
    }

    /**
     * 
     * @param string $id
     * @return Intervenant
     */
    public static function getIntervSel($id) {
        $sql = "SELECT id,nom,prenom,mail,actif,role_code,site_uai FROM intervenant where site_uai = :site_uai and id = :id";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":site_uai", $_SESSION['admin']['site_uai']);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\entities\Intervenant');
        $ligne = $stmt->fetch();
        return $ligne;
    }

    /**
     * 
     * @param string $password1
     * 
     */
    public static function newPass($password1) {
        $sql = "update intervenant set password = md5(:password) where id = :id";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":id", $_SESSION['admin']['id']);
        $stmt->bindValue(":password", $password1);
        $res = $stmt->execute();
        if ($res) {
            return $res;
        }
        $ligne = $stmt->fetch();
        return $ligne;
    }

    public static function newintervmdp($password1, $id) {
        $sql = "update intervenant set password = md5(:password) where id = :id";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":password", $password1);
        $res = $stmt->execute();
        if ($res) {
            return $res;
        }
        $ligne = $stmt->fetch();
        return $ligne;
    }

    public static function enableinterv($id) {
        $sql = "update intervenant set actif = 1 where id = :id";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $res = $stmt->execute();
        if ($res) {
            return $res;
        }
        $ligne = $stmt->fetch();
        return $ligne;
    }

    public static function disableinterv($id) {
        $sql = "update intervenant set actif = 0 where id = :id";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $res = $stmt->execute();
        if ($res) {
            return $res;
        }
        $ligne = $stmt->fetch();
        return $ligne;
    }

    public static function deleteinterv($id) {
        $sql = "delete from intervenant where id = :id";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $res = $stmt->execute();
        if ($res) {
            return $res;
        }
        $ligne = $stmt->fetch();
        return $ligne;
    }

    public static function addinterv($nom, $prenom, $mail, $password, $actif, $role) {
        $sql = "insert into intervenant (nom, prenom, mail, password, actif, role_code, site_uai, cle) values (:nom, :prenom, :mail, md5(:password), :actif, :role, :site, 1)";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":nom", $nom);
        $stmt->bindValue(":prenom", $prenom);
        $stmt->bindValue(":mail", $mail);
        $stmt->bindValue(":password", $password);
        $stmt->bindValue(":actif", $actif);
        $stmt->bindValue(":role", $role);
        $stmt->bindValue(":site", $_SESSION['admin']['site_uai']);
        $res = $stmt->execute();
        if ($res) {
            return $res;
        }
        $ligne = $stmt->fetch();
        return $ligne;
    }

    public static function importInterv($nom, $prenom, $mail, $password, $actif, $role) {
        $sql = "insert into intervenant (nom, prenom, mail, password, actif, role_code, site_uai, cle) values (:nom, :prenom, :mail, md5(:password), :actif, :role, :site, 1)";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->bindValue(":nom", $nom);
        $stmt->bindValue(":prenom", $prenom);
        $stmt->bindValue(":mail", $mail);
        $stmt->bindValue(":password", $password);
        $stmt->bindValue(":actif", $actif);
        $stmt->bindValue(":role", $role);
        $stmt->bindValue(":site", $_SESSION['admin']['site_uai']);
        $res = $stmt->execute();
        if ($res) {
            return $res;
        }
        $ligne = $stmt->fetch();
        return $ligne;
    }

    public static function getGraph1() {
        $sql = "SELECT * FROM FirstGraph;";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->execute();
        $ligne = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $ligne;
    }
    
    public static function getGraph2() {
        $sql = "SELECT * FROM SecondGraph;";
        $stmt = PdoBD::getInstance()->getMonPdo()->prepare($sql);
        $stmt->execute();
        $ligne = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $ligne;
    }

}
