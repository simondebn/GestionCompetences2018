<?php
/**ffiche le tableau désigné
 * @param $arr
 */
function debug($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/**Permet de générer le rendu des pages
 * @param $view, chemin de la vue
 * @param $params, tableau de paramètre contenant les variables utilisées
 */
function render($view, $params){
    extract($params);
    include 'app/view/inc/header.php';
    include 'app/view/inc/menu.php';
    include 'app/view/' . $view . '.php';
    include 'app/view/inc/footer.php';
}

function renderConnexion($view, $params){
    extract($params);
    include 'app/view/inc/header.php';
    include 'app/view/' . $view . '.php';
    include 'app/view/inc/footerConnexion.php';
}

/**
 * Convertie les caractères spéciaux en entité HTML
 * @return string
 */
function h($str){
    return htmlspecialchars($str);
}
