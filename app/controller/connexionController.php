<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 14/02/2018
 * Time: 11:36
 */
if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'checkConnexion') {
    if ($personneModelDb->checkPassword($_POST['myParams']['params']['email'], $_POST['myParams']['params']['password'])) {
        $user = $personneModelDb->getFromEmail($_POST['myParams']['params']['email']);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['compte_admin'] = $user['compte_admin'];
        $_SESSION['open_modal'] = $user['never_connected'];

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
}
elseif (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deconnexion') {
    session_destroy();
}