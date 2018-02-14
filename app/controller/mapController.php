<?php

$competences = $compModelDb->getAll();

if (isset($_POST['recherche'])) {
    $recherche = $_POST['recherche'];
    $personnes = $personneModelDb->getRecherche($_POST['recherche']);

    foreach ($personnes as $personne){
        if (isset($_SESSION['user_id']) && $personne['id'] == $_SESSION['user_id']) {
            unset($personnes[$personne['id']]);
        }
    }
    echo json_encode($personnes);
}

