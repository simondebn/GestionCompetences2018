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

/*** récupérer les compétences d'un profil ***/
function getPersonneSkills($id, $personneModelDb){
    return $personneModelDb->getPersonneCompetences($id);
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
    // TODO généger un mot de passe aléatoire
    $_POST['myParams']['params']['password'] = sha1('dadfba16');
    try {
        $personneModelDb->add($_POST['myParams']['params']);
    } catch (PDOException $e) {
        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Une erreur est survenue !'
        ));
        $error = true;
    }

    if ($error === false) {
        // TODO envoyer mail au nouvel utilisateur
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Le nouvel utilicateur a été créé !',
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
        $personneModelDb->delete($_POST['id']);
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
            'msg' => 'Le profil a bien été supprimé !',
        ));
    }
}
/*** Modification d'un personne ***/

function modifyPersonne($params, $modifyPersonne)
{
    return $modifyPersonne->modify($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'modifyPersonneNewPassword') {

    try {
        $personneModelDb->modifyNewPassword($_POST['myParams']);
        // TODO enregistrer les nouvelles competences (dans $_POST['myParams']['competences'])
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
            'msg' => 'Votre modification a été enregistrée !',
        ));
    }
}
if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'modifyPersonneKeepPassword') {

    try {
        $personneModelDb->modifyKeepPassword($_POST['myParams']['params']);
        // TODO enregistrer les nouvelles competences (dans $_POST['myParams']['competences'])
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
            'msg' => 'Votre modification a été enregistrée !',
        ));
    }
}