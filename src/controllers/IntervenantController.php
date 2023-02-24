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

    private function run_index() {
        $_SESSION['navs'] = ["Intervenants" => "?uc=intervenant&action=index"];
        $intervenants = IntervenantRepository::getAll();
        $this->smarty->assign('intervenants', $intervenants);
        $this->smarty->display('intervenant/index_intervenant.tpl');
    }

}
