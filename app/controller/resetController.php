<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 14/02/2018
 * Time: 17:53
 */

$personne = null;

if(isset($_POST['myFunction']) && $_POST['myFunction'] === 'resetPassword'){

    $password_page_reset = sha1($_POST["myParams"]["password"]);
    $password_page_reset2 = sha1($_POST["myParams"]["password2"]);

    if($password_page_reset == $password_page_reset2){

        if($password_page_reset != $personneModelDb->getLastPassword($_POST["myParams"]["email"])){
            $personneModelDb->changePassword($_POST["myParams"]["email"], $password_page_reset);
            echo json_encode(array(
                'type' => 'success',
                'msg' => 'Mot de passe modifié !',
                'email' => $_POST["myParams"]["email"]
            ));
        }
        else{
            echo json_encode(array(
                'type' => 'danger',
                'msg' => 'Ne pas mettre un mot de passe identique à l\'ancien !'
            ));
        }
    }
    else{
        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Les deux mot de passe ne sont pas identiques !'
        ));
    }
}
else{
    if(isset($_GET['param'])){
        $personne = $personneModelDb->getResetPassword($_GET['param']);
        if($personne != null){
            renderSolo('reset', [
                'title'   => 'Reset Password',
                'personne'   => $personne,
            ]);
        }
        else{
            header('Location: main');
        }
    }
    else{
        header('Location: main');
    }
}
