<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 14/02/2018
 * Time: 15:34
 */
if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'resetPassword') {

    $cle = sha1(time() + $_POST['myParams']);

    $personneModelDb->resetPassword($_POST['myParams'], $cle);

    $mailer = ConnectSmtp();

    // Create a message
    $message = (new Swift_Message('Réinitialisation de votre mot de passe !'))
        ->setFrom(['contact@wittgenstein.fr' => 'Support Wittgenstein'])
        ->setTo([$_POST['myParams']])
        ->setBody('lien : http://localhost:4567/GestionCompetences2018/reset-'.$cle);

    // Send the message
    $result = $mailer->send($message);

    echo json_encode(array(
        'type' => 'success',
        'msg' => 'Un e-mail vient être envoyé !'
    ));
}