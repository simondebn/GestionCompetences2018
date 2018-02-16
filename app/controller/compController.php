<?php

$error = false;
$liste = $compModelDb->getAll();
$competences = $compModelDb->getMostUsed();

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addCompetence') {
    
    try {
        addCompetence($_POST['myParams'], $compModelDb);

    } catch (PDOException $e) {
        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Une erreur est survenue !'
        ));
        $error = true;
    }

    if ($error === false) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre nouvelle compétence a été enregistrée !',
        ));
    }
}

else if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deleteCompetence') {

    try {
        deleteCompetence($_POST['id'], $compModelDb);

    } catch (PDOException $e) {
        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Une erreur est survenue !'
        ));
        $error = true;

    }
    if ($error === false) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre compétence a été supprimée !',
        ));
    }
}

else if (isset($_SESSION['compte_admin']) && $_SESSION['compte_admin']) {
    render('competences',[
        'title' => 'Liste des compétences',
        'skill_liste' => $liste,
        'comp_model' => $compModelDb,
        'tags' => $competences
    ]);
}


/*** GESTION DES COMPETENCES ***/
/*** Ajout d'une compétence ***/
function addCompetence($params, $compModelDb)
{
    return $compModelDb->add($params['params']);
}

/*** Suppression d'une compétence ***/

function deleteCompetence($id, $compModelDb)
{
    return $compModelDb->delete($id);
}

/*** récupérer les compétences enfants***/
function getChildrenCompetence($id, $compModelDb)
{
    return $compModelDb->getChildren($id);
}