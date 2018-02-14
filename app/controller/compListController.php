<?php

$competences = $compModelDb->getMostUsed();

if (isset($_GET['recherche'])) {
    $personnes = $personneModelDb->getRecherche($_GET['recherche']);

    $users = [];
    $user_skills = [];

    foreach ($personnes as $personne){
        $user_skills = $personneModelDb->getCompetences($personne['id']);
        $users[] = [ 'id' => $personne['id'], 'prenom' => $personne['prenom'], 'nom' => $personne['nom'], 'skills' => $user_skills];
    }
}

render('main', [
    'title'   => 'Liste des compétences',
    'users'   => $users,
    'tags' => $competences
]);
