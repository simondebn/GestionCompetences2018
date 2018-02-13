<?php

$personnes = $personneModelDb->getAll();

$users = [];
$skills = [];

foreach ($personnes as $personne){
        $skills = $personneModelDb->getCompetences($personne['id']);
        $users[] = [ 'prenom' => $personne['prenom'], 'nom' => $personne['nom'], 'skills' => $skills];
}


if (isset($_POST['myFunction']) && isset($_POST['myFunction']) && $_POST['myFunction'] === 'checkConnexion') {
    if ($personneModelDb->checkPassword($_POST['myParams']['params']['email'], $_POST['myParams']['params']['password'])) {
        $user = $personneModelDb->getFromEmail($_POST['myParams']['params']['email']);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['compte_admin'] = $user['compte_admin'];

        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Connexion OK'
        ));
    } else {
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
} elseif (isset($_POST['myFunction']) && isset($_POST['myFunction']) && $_POST['myFunction'] === 'getAllLocations') {
    echo json_encode($personnes);
} elseif (isset($_POST['myFunction']) && isset($_POST['myFunction']) && $_POST['myFunction'] === 'autoCompleteCompetence') {
    echo json_encode($compModelDb->getRecherche($_POST['search']));
} elseif (isset($_POST['myFunction']) && isset($_POST['myFunction']) && $_POST['myFunction'] === '...') {
} elseif (isset($_SESSION['user_id'])) {
    render('main', [
        'title'   => 'Accueil',
        'users'   => $users
    ]);
} else {
    renderConnexion('home', [
        'title' => 'Connexion',
    ]) ;
}

