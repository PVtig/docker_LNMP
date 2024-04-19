<?php




header('Access-Control-Allow-Origin: *');
header('Content-type: json/application');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Credentials: true');

require_once './conect.php';
require_once './sqlQeries.php';
require './functions.php';
require './classes.php';


// $statement = $pdo->query('SELECT * FROM cars');
// $result = $statement->fetchAll(PDO::FETCH_ASSOC);
// $json = json_encode($result);
// print_r($json); 

$method = $_SERVER['REQUEST_METHOD'];
$get = $_SERVER['REQUEST_URI'];
$params = explode('/', $get);

$type;
$id;
$update;

if (isset($params[1])) {
    $type = $params[1];
    print_r($type);
} 
if (isset($params[2])) {
    $id = $params[2];
    print_r($id);
} 
if (isset($params[3])) {
    $update = $params[3];
    print_r($update);
} 
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
                $class->add($pdo, $data, $type);
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
    print_r('rtrt'); 
    exit($e->getMessage());
}

// declare(strict_types=1);

// phpinfo();

// echo "Hello World";

