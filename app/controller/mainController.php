<?php

$personnes = $personneModelDb->getAll();
$competences = $compModelDb->getAll();

$users = [];
$table_skills = [];

foreach ($personnes as $personne){
    if ($personne['id'] != $_SESSION['user_id']) {
        $table_skills = $personneModelDb->getCompetences($personne['id']);
        $users[] = [ 'prenom' => $personne['prenom'], 'nom' => $personne['nom'], 'skills' => $table_skills, 'id' => $personne['id']];
    }
}


if (isset($_SESSION['user_id']) && isset($_POST['myFunction']) && $_POST['myFunction'] === 'getAllLocations') {
    echo json_encode($personnes);
} elseif (isset($_SESSION['user_id']) && isset($_POST['myFunction']) && $_POST['myFunction'] === 'autoCompleteCompetence') {
    echo json_encode($compModelDb->getRecherche($_POST['search']));
} elseif (isset($_SESSION['user_id']) && isset($_POST['myFunction']) && $_POST['myFunction'] === 'modalModifyPersonne') {
    if (strlen($_POST['user_id'])) {
        $result = $personneModelDb->getOne($_POST['user_id']);
        echo json_encode($result);
    } else {
        $result = $personneModelDb->getOne($_SESSION['user_id']);
        echo json_encode($result);
    }
} elseif (isset($_SESSION['user_id']) && isset($_POST['myFunction']) && $_POST['myFunction'] === '...') {
} elseif (isset($_SESSION['user_id'])) {
    render('main', [
        'title'   => 'Accueil',
        'users'   => $users,
        'tags' => $competences
        
    ]);
} else {
    renderConnexion('home', [
        'title' => 'Connexion',
    ]) ;
}

