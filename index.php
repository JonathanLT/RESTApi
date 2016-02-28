<?php
/**
 * Created by PhpStorm.
 * User: loquet_j
 * Date: 28/02/2016
 * Time: 18:37
 */
ini_set('display_errors', 1);
header('Content-Type: application/json');

//define("EXT_PHP", ".php");
//define("EXT_PHTML", ".phtml");
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
//
//require('App/Model/Model.php');
//require('App/Controller/Controller.php');
//require('Config/myPDO.php');

spl_autoload_register(function ($namespace) {
    $namespace = str_replace("REST\\", "", $namespace);
    $controller = implode(DIRECTORY_SEPARATOR, explode("\\", $namespace));
    include "$controller.php";
});

$routes = new SimpleXMLElement(file_get_contents("Config" . DIRECTORY_SEPARATOR . "routes.xml"));
$routesList = new \REST\Config\Router();
foreach ($routes->url as $url) {
    $routesList->addRoute(new \REST\Config\Route($url->route, $url->controller));
}
$root = preg_replace("~p=~", "", $_SERVER['QUERY_STRING']);
$params = explode("/", $root);
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($params[1])) {
    $nameController = isset($params[0]) && !empty($params[0]) ? ucfirst($params[0]) : 'Users';
    $action = 'getIdAction';
    $namespace = "\\REST\\App\\Controller\\$nameController";
    $controller = new $namespace;
    if (method_exists($controller, $action)) {
        $controller->$action($params[1]);
    } else {
        echo "Method not found";
    }
}
