<?php

$personnes = $personneModelDb->getAll();

$users = [];
$admins = [];

foreach ($personnes as $personne){
    if ($personne['compte_admin'] == 1){
        $admins[] = $personne;
    }else{
        $users[] = $personne;
    }
}

render('userList', [
    'title'   => 'Liste des utilisateurs',
    'users'   => $users,
    'admins'  => $admins,
]);

