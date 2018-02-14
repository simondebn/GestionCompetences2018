<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 12:10
 */

session_start();

include 'helpers/functions.php';
include 'app/config/routes.php';
include 'app/config/db.php';
include 'app/model/personneModelDb.php';
include 'app/model/compModelDb.php';

//COMPOSER LOAD
require_once 'composer/vendor/autoload.php';

$personneModelDb = new personneModelDb($db);
$compModelDb = new compModelDb($db);

$page = DEFAULT_PAGE;


if(isset($_GET['page']) && isset($site_pages[$_GET['page']]))
{
    $page = $_GET['page'];
}


if(!isset($_SESSION['user_id']) || !isset($_SESSION['compte_admin']) || !isset($_SESSION['open_modal'])){
    if($page != "connexion" && $page != "mail" && $page != "reset"){
        $page = "accueil";
    }
}
elseif($page == "accueil"){
    $page = "main";
}

include 'app/controller/' . $site_pages[$page] . 'Controller.php';