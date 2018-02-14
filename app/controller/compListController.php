<?php

if (isset($_GET['recherche'])) {
    $personnes = $personneModelDb->getRecherche($_GET['recherche']);

    $users = [];
    $skills = [];

    foreach ($personnes as $personne){
        $skills = $personneModelDb->getCompetences($personne['id']);
        $users[] = [ 'id' => $personne['id'], 'prenom' => $personne['prenom'], 'nom' => $personne['nom'], 'skills' => $user_skills];
    }
}

render('main', [
    'title'   => 'Liste des compétences',
    'users'   => $users
]);
