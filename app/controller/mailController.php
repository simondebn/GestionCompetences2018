<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 14/02/2018
 * Time: 15:34
 */
if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'resetPassword') {

    $newPassword = GenPassword(6);
    $newPasswordSha1 = sha1($newPassword);

    $personneModelDb->changePassword($newPasswordSha1, $_POST['myParams']);

    $mailer = ConnectSmtp();

    // Create a message
    $message = (new Swift_Message('Réinitialisation de votre mot de passe !'))
        ->setFrom(['contact@wittgenstein.fr' => 'Support Wittgenstein'])
        ->setTo([$_POST['myParams']])
        ->setBody('Votre nouveau mdp : '.$newPassword);

    // Send the message
    $result = $mailer->send($message);

    echo json_encode(array(
        'type' => 'success',
        'msg' => 'Un e-mail vient être envoyé !'
    ));
}