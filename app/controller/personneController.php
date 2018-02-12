<?php

$error = false;

if(isset($_POST['myParams'])){
    foreach ($_POST['myParams']['params'] as $str){
        $str = h($str);
    }
}

/*** GESTION DES PERSONNES ***/

/*** Récupérer un profil ***/

function getOnePersonne($id, $personneModelDb)
{
    return $personneModelDb->getOne($id);
}

/*** Récupérer tous les profils ***/
function getAllPersonne($personneModelDb){
    return $personneModelDb->getAll();
}

/*** Récuperer un profil par email ***/

function getFromEmailPersonne($email, $personneModelDb){
    return $personneModelDb->getFromEmail($email);
}

/*** Ajout d'une personne ***/
function addPersonne($params, $personneModelDb)
{
    return $personneModelDb->add($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addPersonne') {

    $_POST['myParams']['params']['password'] = sha1($_POST['myParams']['params']['password']);
    try {
        addPersonne($_POST['myParams'], $personneModelDb);

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
            'msg' => 'Votre ajout a été enregistré !',
        ));
    }
}

/*** Suppression d'une personne ***/

function deletePersonne($id, $personneModelDb)
{
    return $personneModelDb->delete($id);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deletePersonne') {

    try {
        deletePersonne($_POST['id'], $personneModelDb);

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
            'msg' => 'Votre suppression a été enregistré !',
        ));
    }
}
/*** Modification d'un personne ***/

function modifyPersonne($params, $modifyPersonne)
{
    return $modifyPersonne->modify($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'modifyPersonne') {

    try {
        modifyPersonne($_POST['myParams'], $PersonneModelDb);
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
            'msg' => 'Votre modification a été enregistré !',
        ));
    }
}