<?php
/**
 * Created by Netbeans.
 * User: cdi
 * Date: 09/02/2018
 * Time: 11:40
 */

$competences = $compModelDb->getAll();

render('testVue', [
    'title'   => 'Liste des compétences',
    'skills'   => $competences
]);

