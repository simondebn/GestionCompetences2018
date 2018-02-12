<?php

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'checkConnexion') {
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
} elseif (isset($_POST['myFunction']) && $_POST['myFunction'] === 'getAllLocations') {
    echo json_encode($personneModelDb->getAll());
} elseif (isset($_POST['myFunction']) && $_POST['myFunction'] === 'autoCompleteCompetence') {
    echo json_encode($compModelDb->getRecherche($_POST['search']));
} elseif (isset($_POST['myFunction']) && $_POST['myFunction'] === '...') {
} else {
    $allPersonnes = $personneModelDb->getAll();

    $listePersonnes = [];

    foreach ($allPersonnes as $personne){
        $listePersonnes[] = $personne;
    }

    render('main', [
        'title'   => 'Accueil',
        'listePersonne'   => $listePersonnes,
    ]);

}

