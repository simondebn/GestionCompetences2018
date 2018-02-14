<?php

if (isset($_GET['recherche'])) {
    $personnes = $personneModelDb->getRecherche($_GET['recherche']);

    $users = [];
    $skills = [];

    foreach ($personnes as $personne){
        $skills = $personneModelDb->getCompetences($personne['id']);
        $users[] = [ 'prenom' => $personne['prenom'], 'nom' => $personne['nom'], 'skills' => $skills];
    }
}

render('main', [
    'title'   => 'Liste des compétences',
    'users'   => $users
]);
