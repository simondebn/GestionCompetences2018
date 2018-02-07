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


$page = DEFAULT_PAGE;


if(isset($_GET['page']) && isset($site_pages[$_GET['page']]))
{
    $page = $_GET['page'];
}

include 'app/controller/' . $site_pages[$page] . 'Controller.php';