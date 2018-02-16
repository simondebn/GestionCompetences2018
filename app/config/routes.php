<?php

define('DEFAULT_PAGE', 'accueil');

$site_pages = [
    'accueil' => 'home',
    'connexion' => 'connexion',
    'main' => 'main',
    'recherche' => 'compList',
    'personne' => 'personne',
    'mail' => 'mail',
    'competences' => 'comp',
    'map' => 'map',
    'reset' => 'reset',
];

if (isset($_SESSION['compte_admin']) && ! $_SESSION['compte_admin']) {
    $site_pages['competences'] = 'main';
}