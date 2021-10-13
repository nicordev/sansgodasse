<?php

/**
 * Permet de charger les classes avec l'autoload
 *
 * @param $classname le nom de la classe à charger
 */
function classLoad($classname) {
    require ROOT . '/model/' . $classname .'.php';
}

/**
 *  Renvoie un objet PDO connecté à la base de données
 *
 * @param bool $online true pour choisir la base de donnée en ligne
 * @return PDO
 */
function dbConnect($online = true) {
    try {
        $db = new \PDO('mysql:host=localhost;dbname=sansgodasse;charset=utf8', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
    }
    catch(Exception $e) {
        exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }
    return $db;
}

// Autoload
spl_autoload_register('classLoad');

// Base de données
$db = dbConnect(false);

// Session
session_start();
if (isset($_GET['action']) AND $_GET['action'] === 'disconnect')
    session_destroy();

// Routeur
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'about':
            require(ROOT . '/controller/about.php');
            break;
        case 'learn':
            require(ROOT . '/controller/learn.php');
            break;
        case 'help':
            require(ROOT . '/controller/help.php');
            break;
        case 'blog':
            require(ROOT . '/controller/blog.php');
            break;
        case 'contact':
            require(ROOT . '/controller/contact.php');
            break;
        case 'tests':
            require(ROOT . '/controller/tests.php');
            break;
        default:
            require(ROOT . '/view/mainView.php');
    }
} else {
    require(ROOT . '/view/mainView.php');
}
