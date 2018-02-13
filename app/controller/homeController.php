<?php

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deconnexion') {
    $_SESSION = array();
} else {
    renderConnexion('home', [
        'title' => 'Connexion',
    ]) ;
}