<?php

$error = false;

if(isset($_POST['myParams'])){
    foreach ($_POST['myParams']['params'] as $str){
        $str = h($str);
    }
}

/*** GESTION DES COMPETENCES ***/

/*** récupérer une compétence ***/
function getOneCompetence($id, $compModelDB)
{
    return $compModelDB->getOne($id);
}

/*** récupérer toutes les compétences ***/
function getAllCompetence($compModelDB)
{
    return $compModelDB->getAll();
}

/*** Ajout d'une compétence ***/
function addCompetence($params, $compModelDb)
{
    return $compModelDb->add($params['params']);
}

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

/*** Suppression d'une compétence ***/

function deleteCompetence($id, $compModelDb)
{
    return $compModelDb->delete($id);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deleteCompetence') {

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

/*** Modification d'un competence ***/

function modifyCompetence($params, $compModelDb)
{
    return $compModelD->modify($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'modifyCompetence') {

    try {
        modifyCompetence($_POST['myParams'], $compModelDb);
        }catch (PDOException $e) {
        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Une erreur est survenue !'
        ));
        $error = true;
    }
    if ($error === false) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'La compétence a été modifiée !',
        ));
    }
}

/*** récupérer les compétences enfants***/
function getChildrenCompetence($id, $compModelDb)
{
    return $compModelDb->getChildren($id);
}