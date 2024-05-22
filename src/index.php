<?php

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
require './functions.php';
require './classes.php';

$method = $_SERVER['REQUEST_METHOD'];
$get = $_SERVER['REQUEST_URI'];
$params = explode('/', $get);

$type = (isset($params[1])) ?  $params[1] : NULL;
$id = (isset($params[2])) ? $params[2] : NULL;
$update = (isset($params[3])) ? $params[3] : NULL;

$class = new Crud();


/* Basic 'try' 'PDO' filling its choice of logic 
    depending on the type of method */
try {
    
    switch ($method) {
        case 'GET':
            
            $class->get($pdo, $type, $id);
            break;

        case 'POST':

            if ($update == 'update') {
                $class->update($pdo, $id, $_POST, $type);
            } else {
                $class->add($pdo, $_POST, $type);
            }
            break;

        case 'DELETE':

            $class->delete($pdo, $id, $type);
            break;

        default:
            echo 'error';
            break;
    }
} catch (PDOException $e) {
    exit($e->getMessage());
}