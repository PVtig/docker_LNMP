<?php

namespace factory;

use MainComposer;
use PDOException;

header('Access-Control-Allow-Origin: *');
header('Content-type: json/application');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Credentials: true');

require_once './conect.php';
require_once './SQLQeries/sqlUserQeries.php';
require_once './SQLQeries/sqlCarQeries.php';
require_once './SQLQeries/sqlReportsQeries.php';
require_once './SQLQeries/sqlGarageQeries.php';
require './ClassComposer.php';

spl_autoload_register(function ($className) {
	$className = str_replace("..", "", $className);
	require_once("./factory/$className.php");
});

$method = $_SERVER['REQUEST_METHOD'];
$get = $_SERVER['REQUEST_URI'];
$params = explode('/', $get);

$type = (isset($params[1])) ?  $params[1] : NULL;
$id = (isset($params[2])) ? $params[2] : NULL;
$update = (isset($params[3])) ? $params[3] : NULL;

$factory = new MainComposer;
$class = $factory->getClass($type);
   
        try {
            switch ($method) {
                case 'GET':
                    (isset($id)) ? $class->getPost($pdo, $id) : $class->getPosts($pdo);
			        break;
                case 'POST':
                    ($update == 'update') ? $class->updatePost($pdo, $id, $_POST) : $class->addPost($pdo, $_POST);
                    break;
                case 'DELETE':
                    $class->deletePost($pdo, $id);
                    break;
                default:
                    echo 'error';
                    break;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }