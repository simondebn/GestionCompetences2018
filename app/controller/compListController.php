<?php

$competences = $compModelDb->getMostUsed();


if (isset($_GET['recherche'])) {
    $recherche = $_GET['recherche'];
    $personnes = $personneModelDb->getRecherche($_GET['recherche']);

    $users = [];
    $user_skills = [];

    foreach ($personnes as $personne){
        if (isset($_SESSION['user_id']) && $personne['id'] != $_SESSION['user_id']) {
            $user_skills = $personneModelDb->getCompetences($personne['id']);
            $users[] = ['id' => $personne['id'], 'prenom' => $personne['prenom'], 'nom' => $personne['nom'], 'skills' => $user_skills];
        }
    }
    render('main', [
        'title'   => 'Liste des compétences',
        'users'   => $users,
        'tags' => $competences,
        'recherche' => $recherche
    ]);
}

