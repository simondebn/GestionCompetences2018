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

function GenPassword($size)
{
    $password = null;
    // Initialisation des caractères utilisables
    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

    for($i=0;$i<$size;$i++)
    {
        $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
    }

    return $password;
}

function ConnectSmtp(){

    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 25))
        ->setUsername('3c1597c4c1e6ab')
        ->setPassword('ba7691cb1f0e8a');

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    return $mailer;
}
