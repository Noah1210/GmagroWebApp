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

}
