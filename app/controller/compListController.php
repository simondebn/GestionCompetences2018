<?php

$competences = $compModelDb->getAll();

render('testVue', [
    'title'   => 'Liste des compétences',
    'skills'   => $competences
]);

