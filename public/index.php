<?php
session_start();
// Ici j'inclus le fichier autoload.php car c'est grâce à ce fichier que je vais pouvoir inclure TOUTES mes dépendances composer (donc ce qu'il y a dans le dossier vendor)
require_once __DIR__ . "/../vendor/autoload.php";
// Change the path according to your project
use App\Controllers\MainController;
use App\Controllers\CoreController;
use App\Controllers\UserController;
use App\Controllers\ReportController;

use Alterouter\Alterouter;
use Alterouter\Request;

// Je créer une instance de Alterouter (la librairie que j'ai installé)
$router = new Alterouter();

// Create a route with the generic method "addRoute"
$router->addRoute('GET', '/', MainController::class . '@home', 'home');

$router->addRoute('GET', '/produit', MainController::class . '@produit', 'produit');

$router->addRoute('GET', '/register', UserController::class . '@GETregister', 'GETregister');
$router->addRoute('POST', '/register', UserController::class . '@POSTregister', 'POSTregister');

$router->addRoute('GET', '/login', UserController::class . '@GETlogin', 'GETlogin');
$router->addRoute('POST', '/login', UserController::class . '@POSTlogin', 'POSTlogin');

$router->addRoute('GET', '/logout', UserController::class . '@logout', 'logout');

$router->addRoute('GET', '/report', ReportController::class . '@GetReport', 'GetReport');
$router->addRoute('POST', '/report', ReportController::class . '@POSTReport', 'POSTReport');

$router->addRoute('GET', '/report/{id}', ReportController::class . '@GethandleReport', 'GethandleReport');
$router->addRoute('POST', '/report/{id}', ReportController::class . '@POSThandleReport', 'POSThandleReport');


$route = $router->match(Request::getMethodFromGlobals(), Request::getPathFromGlobals());
// dump($match);

if ($route !== null) {
    if (is_string($route->getHandler())) {
        [$controller, $method] = explode('@', $route->getHandler());
        $controller = new $controller();
        $controller->$method($route->getMatches());
    } else {
        call_user_func_array($route->getHandler(), $route->getMatches());
    }
} else {
    // Handle 404
    $controller = new CoreController();
    $controller->notFound();
}