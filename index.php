<?php
session_start();
ini_set('display_errors', 'on');
error_reporting(E_ALL);
date_default_timezone_set('Europe/Paris');
require 'vendor/autoload.php';
require_once 'config_bd.php';   //A modifier en priorité et à exclure du commit
                                //si ce n'est pas déjà fait

spl_autoload_register(function ($className) {
    $classNameR = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    include_once 'src/' . $classNameR . '.php';
});

$smarty = new Smarty();
$smarty->setTemplateDir('./views');
$smarty->setCacheDir('./cache');
$smarty->setConfigDir('./configs');
$smarty->setCompileDir('./compile');
$smarty->configLoad('config');

//$smarty->debugging_ctrl= 'URL';

if (!isset($_SESSION['admin'])) {
    $uc = "intervenant";
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action != "check") {
        $action = "login";
    }
} else {
    $uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
    if (!$uc) {
        $uc = 'intervenant';
        $action = "home";
    } else {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    }
}
switch ($uc) {
    case 'intervenant':
        $intervenantController = new \controllers\IntervenantController($smarty);
        $intervenantController->run($action);
        break;
    case 'intervention':
        $interventionController = new \controllers\InterventionController($smarty);
        $interventionController->run($action);
        break;
    case 'csod':
        $csodController = new \controllers\CSODController($smarty);
        $csodController->run($action);
        break;
    case 'machine':
        $machineController = new \controllers\MachineController($smarty);
        $machineController->run($action);
        break;
    case 'stat':
        $statController = new \controllers\StatController($smarty);
        $statController->run($action);
        break;
    case 'disconnect':
        unset($_SESSION['admin']);
        session_destroy();
        header("Location: index.php?uc=connect&action=login");
        break;
    default :
        $smarty->assign('titre', "Mauvaus choix de uc");
        $smarty->assign('msg', "Use case non implémenté");
        $smarty->assign('redirect', "index.php");
        $smarty->display('info.tpl');
}



