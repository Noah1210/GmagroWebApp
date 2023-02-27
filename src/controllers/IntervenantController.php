<?php

namespace controllers;

use repositories\IntervenantRepository;

class IntervenantController extends IController {

    public function __construct($smarty) {
        parent::__construct($smarty);
    }

    public function run($action) {
        switch ($action) {
            case 'home':
                $this->run_home();
                break;
            case 'login':
                $this->run_login();
                break;
            case 'check':
                $this->run_check();
                break;
            case 'index':
                $this->run_index();
                break;
            case 'newpass':
                $this->run_newpass();
                break;
            case 'intervmdp':
                $this->run_intervmdp();
                break;
            case 'newintervmdp':
                $this->run_newintervmdp();
                break;
            case 'disableinterv':
                $this->run_disableinterv();
                break;
            case 'enableinterv':
                $this->run_enableinterv();
                break;
            case 'deleteinterv':
                $this->run_deleteinterv();
                break;
            case 'addinterv':
                $this->run_addinterv();
                break;
            case 'importInterv':
                $this->run_importInterv();
                break;
            case 'exportInterv':
                $this->run_exportInterv();
                break;
            case 'mailInterv':
                $this->run_mailInterv();
                break;
            case 'sendMail':
                $this->run_sendMail();
                break;
            default:
                $this->run_default_case("Intervenant", "?uc=intervenant&action=index");
        }
    }

    private function explodeToSession($admin) {
        $_SESSION['admin']['id'] = $admin->getId();
        $_SESSION['admin']['nom'] = $admin->getNom();
        $_SESSION['admin']['prenom'] = $admin->getPrenom();
        $_SESSION['admin']['mail'] = $admin->getMail();
        $_SESSION['admin']['role_code'] = $admin->getRole_code();
        $_SESSION['admin']['site_uai'] = $admin->getSite_uai();
    }

    private function run_home() {
        $this->smarty->assign('action', 'Mon profil');
        $this->smarty->display('intervenant/home_intervenant.tpl');
    }

    private function run_login() {
        $this->smarty->display('intervenant/login_intervenant.tpl');
    }

    private function run_check() {
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        if ($mail && $password) {
            $admin = IntervenantRepository::auth($mail, $password);
            if ($admin) {
                if ($admin->isActif()) {
                    $this->explodeToSession($admin);
                    $_SESSION['navs'] = ["Accueil" => "?uc=intervenant&action=home"];
                    $this->smarty->assign('is_accueil', true);
                    $this->smarty->assign('action', 'Informations de profil utilisateur');
                    $this->smarty->display('intervenant/home_intervenant.tpl');
                } else {
                    $this->display_info("Problème de connexion", "Votre compte est désactivé. Contactez votre superadministrateur", "index.php?uc=connect&action=login");
                }
            } else {
                $this->display_info("Problème de connexion", "Problème de Login/Mdp", "index.php?uc=connect&action=login");
            }
        } else {
            echo "pas de mail et pas de password";
        }
    }

    private function run_newpass() {
        $password1 = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING);
        $newPass = IntervenantRepository::newPass($password1);
        if ($newPass) {
            $this->smarty->assign('action', 'Votre mot de passe est bien changer');
            $this->smarty->display('intervenant/home_intervenant.tpl');
        } else {
            $this->display_info("Problème de bdd", "Votre mdp na pas pu être changer dans la base", "index.php");
        }
    }

    private function run_intervmdp() {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $password1 = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING);
        $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
        $nom = filter_input(INPUT_GET, 'nom', FILTER_SANITIZE_STRING);
        $prenom = filter_input(INPUT_GET, 'prenom', FILTER_SANITIZE_STRING);
        if ($password1) {
            $newPass = IntervenantRepository::newintervmdp($password1, $id);
            if ($newPass) {
                $intervenants = IntervenantRepository::getAll();
                $this->smarty->assign('intervenants', $intervenants);
                $this->smarty->display('intervenant/index_intervenant.tpl');
            } else {
                $this->display_info("Problème de bdd", "Le mot de passe na pas pu être changer dans la base", "index.php");
            }
        } else {
            $this->smarty->assign('action', "Nouveau mot de passe pour {$prenom} {$nom}");
            $this->smarty->assign('id', "{$id}");
            $this->smarty->display('intervenant/mdp_intervenant.tpl');
        }
    }

    private function run_disableinterv() {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        if ($id) {
            $disable = IntervenantRepository::disableinterv($id);
            if ($disable) {
                $intervenants = IntervenantRepository::getAll();
                $this->smarty->assign('intervenants', $intervenants);
                $this->smarty->display('intervenant/index_intervenant.tpl');
            } else {
                $this->display_info("Problème de bdd", "L'intervenant na pas pu être désactivé dans la base", "index.php");
            }
        } else {
            $this->display_info("Problème d'url", "L'intervenant na pas pu être désactivé", "index.php");
        }
    }

    private function run_enableinterv() {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        if ($id) {
            $enable = IntervenantRepository::enableinterv($id);
            if ($enable) {
                $intervenants = IntervenantRepository::getAll();
                $this->smarty->assign('intervenants', $intervenants);
                $this->smarty->display('intervenant/index_intervenant.tpl');
            } else {
                $this->display_info("Problème de bdd", "L'intervenant na pas pu être activé dans la base", "index.php");
            }
        } else {
            $this->display_info("Problème d'url", "L'intervenant na pas pu être activé", "index.php");
        }
    }

    private function run_deleteinterv() {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        if ($id) {
            $delete = IntervenantRepository::deleteinterv($id);
            if ($delete) {
                $intervenants = IntervenantRepository::getAll();
                $this->smarty->assign('intervenants', $intervenants);
                $this->smarty->display('intervenant/index_intervenant.tpl');
            } else {
                $this->display_info("Problème de bdd", "L'intervenant na pas pu être supprimé de la base", "index.php");
            }
        } else {
            $this->display_info("Problème d'url", "L'intervenant na pas pu être supprimé", "index.php");
        }
    }

    private function run_addinterv() {
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING);
        $actif = filter_input(INPUT_POST, 'checkActive', FILTER_SANITIZE_STRING);
        $role = filter_input(INPUT_POST, 'checkAdmin', FILTER_SANITIZE_STRING);
        if (!$actif) {
            $actif = "0";
        }
        if (!$role) {
            $role = 'Utilisateur';
        }
        if ($mail) {
            $addInterv = IntervenantRepository::addinterv($nom, $prenom, $mail, $password, $actif, $role);
            if ($addInterv) {
                $intervenants = IntervenantRepository::getAll();
                $this->smarty->assign('intervenants', $intervenants);
                $this->smarty->display('intervenant/index_intervenant.tpl');
            } else {
                $this->display_info("Problème de bdd", "L'intervenant na pas pu être ajouté à la base", "index.php");
            }
        } else {
            $this->display_info("Problème d'url", "L'intervenant na pas pu être ajouté", "index.php");
        }
    }

    private function run_importInterv() {
        if (isset($_POST["Import"])) {
            $filename = $_FILES["file"]["tmp_name"];
            if ($_FILES["file"]["size"] > 0) {
                $file = fopen($filename, "r");
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
                    $addintervants = IntervenantRepository::importInterv($getData[0], $getData[1], $getData[2], $getData[3], $getData[4], $getData[5]);
                }
                if ($addintervants) {
                    $intervenants = IntervenantRepository::getAll();
                    $this->smarty->assign('intervenants', $intervenants);
                    $this->smarty->display('intervenant/index_intervenant.tpl');
                } else {
                    $this->display_info("Problème de fichier", "Veuillez entrer un fichier csv correct", "index.php");
                }
                fclose($file);
            }
        }
    }

    private function run_exportInterv() {
        if (isset($_POST["Export"])) {
            header('Content-Encoding: UTF-8');
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=intervenant.csv');
            echo "\xEF\xBB\xBF"; // UTF-8 BOM
            $output = fopen("php://output", "w");
            fputcsv($output, array('nom', 'prenom', 'mail', 'actif', 'role'));
            $intervenants = IntervenantRepository::getAll();
            foreach ($intervenants as $inter) {
                $intervs = array($inter->getNom(), $inter->getPrenom(), $inter->getMail(), $inter->isActif(), $inter->getRole_code());
                fputcsv($output, $intervs);
            }
            fclose($output);
        }
    }

    private function run_mailInterv() {
        $nom = filter_input(INPUT_GET, 'nom', FILTER_SANITIZE_STRING);
        $prenom = filter_input(INPUT_GET, 'prenom', FILTER_SANITIZE_STRING);
        $mail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_STRING);
        $this->smarty->assign('action', "Envoyer un mail à {$prenom} {$nom}");
        $this->smarty->assign('mail', "{$mail}");
        $this->smarty->display('intervenant/mail_intervenant.tpl');
    }

    private function run_sendMail() {
        $destinataire = filter_input(INPUT_POST, 'destinataire', FILTER_SANITIZE_STRING);
        $sujet = filter_input(INPUT_POST, 'sujet', FILTER_SANITIZE_STRING);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $headers = "From:{$_SESSION['admin']['mail']}";
        $result = mail($destinataire, $sujet, $message, $headers);
        if ($result) {
            $intervenants = IntervenantRepository::getAll();
            $this->smarty->assign('intervenants', $intervenants);
            $this->smarty->display('intervenant/index_intervenant.tpl');
        } else {
            $this->display_info("Erreur mail", "Votre mail n'a pas pu être envoyé", "index.php");
        }
    }

    private function run_index() {
        $_SESSION['navs'] = ["Intervenants" => "?uc=intervenant&action=index"];
        $intervenants = IntervenantRepository::getAll();
        $this->smarty->assign('intervenants', $intervenants);
        $this->smarty->display('intervenant/index_intervenant.tpl');
    }

}
