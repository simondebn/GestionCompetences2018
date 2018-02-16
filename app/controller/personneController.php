<?php

$error = false;

if(isset($_POST['myParams'])){
    foreach ($_POST['myParams']['params'] as $str){
        if ( ! is_array($str)) {
            $str = h($str);
        } else {
            foreach ($str as $item) {
                $item = h($item);
            }
        }
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
    $mdp = GenPassword(6);
    $_POST['myParams']['params']['password'] = sha1($mdp);
    $id_ajoute = 0;
    try {
        $id_ajoute = $personneModelDb->add($_POST['myParams']['params']);
    } catch (PDOException $e) {
        if ($e->errorInfo[2] === "Duplicate entry 'a@b.c' for key 'email_UNIQUE'") {
            echo json_encode(array(
                'type' => 'danger',
                'msg' => 'Cet email est déjà enregistré dans la base de données'
            ));
        } else {
            echo json_encode(array(
                'type' => 'danger',
                'msg' => 'Une erreur est survenue !'
            ));
        }
        $error = true;
    }

    if ($error === false) {
        $mailer = ConnectSmtp();

        $message = (new Swift_Message('Création de votre compte sur la plateforme Gestion des Compétences'))
            ->setFrom(['contact@wittgenstein.fr' => 'Support Wittgenstein'])
            ->setTo([$_POST['myParams']['params']['email']])
            ->setBody('Bienvenue sur la plateforme de gestion des compétences. Voici vos accès : identifiant : '. $_POST['myParams']['params']['email'] .' / mot de passe : '. $mdp);

        $result = $mailer->send($message);

        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Le nouvel utilicateur a été créé !',
            'data-id' => $id_ajoute
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
        $personneModelDb->modifyNewPassword($_POST['myParams']['params']);
    }catch (PDOException $e) {
        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Une erreur est survenue !'
        ));
        $error = true;
    }
    if ($error === false) {
        $_SESSION['open_modal'] = false;
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre modification a été enregistrée !',
        ));
    }
}
if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'modifyPersonneKeepPassword') {

    try {
        $personneModelDb->modifyKeepPassword($_POST['myParams']['params']);
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