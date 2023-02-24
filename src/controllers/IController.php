<?php

namespace controllers;

abstract class IController {

    protected $smarty;

    public function __construct($smarty) {
        $this->smarty = $smarty;
    }

    public abstract function run($action);

    public function run_default_case($ucName, $redirect) {
        $this->smarty->assign('titre', "Mauvais choix d'action ");
        $this->smarty->assign('msg', "Action non implémentée pour le uc $ucName");
        $this->smarty->assign('redirect', $redirect);
        $this->smarty->display('info.tpl');
    }

    public function display_info($titre, $msg, $redirect) {
        $this->smarty->assign('titre', $titre);
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('redirect', $redirect);
        $this->smarty->display('info.tpl');
    }

}
