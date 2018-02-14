<?php

$competences = $compModelDb->getAll();

$recherche = $_POST['recherche'];

if (isset($_POST['recherche'])) {
    $personnes = $personneModelDb->getRecherche($_POST['recherche']);

    $users = [];
    $user_skills = [];

    foreach ($personnes as $personne){
        $user_skills = $personneModelDb->getCompetences($personne['id']);
        $users[] = [ 'id' => $personne['id'], 'prenom' => $personne['prenom'], 'nom' => $personne['nom'], 'skills' => $user_skills];
    }
}

echo json_encode($personnes);
