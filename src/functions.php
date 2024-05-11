<?php

/* Select all posts function 
    (Connection, post type) */

function getPosts($pdo, $type)
{
    /* Choice where we knock */
    switch ($type) {
        case 'user':
            $statement = $pdo->query(SQL_GET_USERS);
            break;
        case 'car':
            $statement = $pdo->query(SQL_GET_CARS);
            break;
        case 'report':
            $statement = $pdo->query(SQL_GET_REPORTS);
            break;
        case 'garage':
            $statement = $pdo->query(SQL_GET_GARAGES);
            break;
        default:  
            echo ('eror type');
            break;
    }
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($result);
    print_r($json);
}

/* The function of selecting one post by number 
    (Connection, post ID in the table, post type) */

function getPost($pdo, $id, $variable)
{
    /* Choice where we knock */
    switch ($variable) {
        case 'user':
            $statement = $pdo->prepare(SQL_GET_USER);
            break;
        case 'car':
            $statement = $pdo->prepare(SQL_GET_CAR);
            break;
        case 'report':
            $statement = $pdo->prepare(SQL_GET_REPORT);
            break;
        case 'garage':
            $statement = $pdo->prepare(SQL_GET_GARAGE);
            break;
        default: 
            echo ('eror type');
            break;
    }

    /* Post number transmission */
    $statement->execute(array($id));

    /* Retrieving and Translating Result Set Rows */
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    print_r(json_encode($result));
}


/* Post add function 
    (Connection, data array, post type) */

// function addPost($pdo, $data, $variable)
// {
//     $name = (isset($data['name'])) ?  $data['name'] : NULL;
//     $surname = ($data['surname']) ? $data['surname'] : NULL;
//     $salary = (isset($data['salary'])) ? $data['salary'] : NULL;
//     $number = (isset($data['number'])) ?  $data['number'] : NULL;
//     $type = (isset($data['type'])) ? $data['type'] : NULL;
//     $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;
//     $car_id = (isset($data['car_id'])) ? $data['car_id'] : NULL;
//     $user_id = (isset($data['user_id'])) ? $data['user_id'] : NULL;
//     $capacity = (isset($data['capacity'])) ? $data['capacity'] : NULL;
//     $manager_id = (isset($data['manager_id'])) ? $data['manager_id'] : NULL;

//     /* Choice where we knock */
//     switch ($variable) {
//         case 'user':
//             $stmt = $pdo->prepare(SQL_INSERT_USER);
//             $res = $stmt->execute(array(
//                 ':name' => $name,
//                 ':surname' => $surname,
//                 ':salary' => $salary
//             ));
//             break;
//         case 'car':
//             $statement = $pdo->prepare(SQL_INSERT_CAR);
//             $res = $statement->execute(array(
//                 ':number' => $number,
//                 ':type' => $type,
//                 ':mileage' => $mileage
//             ));
//             break;
//         case 'report':
//             $statement = $pdo->prepare(SQL_INSERT_REPORT);
//             $res = $statement->execute(array(
//                 ':number' => $number,
//                 ':type' => $type,
//                 ':mileage' => $mileage
//                 ':car_id' => $car_id
//                 ':user_id' => $user_id
//             ));
//             break;
//         case 'garage':
//             $statement = $pdo->prepare(SQL_INSERT_GARAGE);
//             $res = $statement->execute(array(
//                 ':number' => $number,
//                 ':capacity' => $capacity
//                 ':manager_id' => $manager_id
//                 ':type' => $type,
//             ));
//             break;
        
//         default: 
//             echo ('eror type');
//             break;
//     }
//     var_dump($res);
// }

/* Post delete function 
        (Connect, post ID, post type) */
// function deletePost($pdo, $id, $variable)
// {

//     /* Choice where we knock */
//     switch ($variable) {
//         case 'user':
//             $statement = $pdo->prepare(SQL_DELETE_USER);
//             break;
//         case 'car':
//             $statement = $pdo->prepare(SQL_DELETE_CAR);
//             break;
//         case 'report':
//             $statement = $pdo->prepare(SQL_DELETE_REPORT);
//             break;
//         case 'garage':
//             $statement = $pdo->prepare(SQL_DELETE_GARAGE);
//             break;
        
//         default: 
//             echo ('eror type');
//             break;
//     }
//     $statement->execute(array($id));
// }


// /**
//  * Post update function 
//  * (Connect, post ID, data array, post type)
//  * 
//  */
// function updatePost($pdo, $id, $data, $variable)
// {
//     $name = (isset($data['name'])) ?  $data['name'] : NULL;
//     $surname = ($data['surname']) ? $data['surname'] : NULL;
//     $salary = (isset($data['salary'])) ? $data['salary'] : NULL;
//     $number = (isset($data['number'])) ?  $data['number'] : NULL;
//     $type = (isset($data['type'])) ? $data['type'] : NULL;
//     $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;
//     $car_id = (isset($data['car_id'])) ? $data['car_id'] : NULL;
//     $user_id = (isset($data['user_id'])) ? $data['user_id'] : NULL;
//     $capacity = (isset($data['capacity'])) ? $data['capacity'] : NULL;
//     $manager_id = (isset($data['manager_id'])) ? $data['manager_id'] : NULL;

//     /* Choice where we knock */
//     switch ($variable) {
//         case 'user':
//             $stmt = $pdo->prepare(SQL_UPDATE_USER_BY_ID);
//             $res = $stmt->execute(array(
//                 ':name' => $name,
//                 ':surname' => $surname,
//                 ':salary' => $salary
//             ));
//             break;
//         case 'car':
//             $statement = $pdo->prepare(SQL_UPDATE_CAR_BY_ID);
//             $res = $statement->execute(array(
//                 ':number' => $number,
//                 ':type' => $type,
//                 ':mileage' => $mileage
//             ));
//             break;
//         case 'report':
//             $statement = $pdo->prepare(SQL_UPDATE_REPORT_BY_ID);
//             $res = $statement->execute(array(
//                 ':number' => $number,
//                 ':type' => $type,
//                 ':mileage' => $mileage
//                 ':car_id' => $car_id
//                 ':user_id' => $user_id
//             ));
//             break;
//         case 'garage':
//             $statement = $pdo->prepare(SQL_UPDATE_GARAGE_BY_ID);
//             $res = $statement->execute(array(
//                 ':number' => $number,
//                 ':capacity' => $capacity
//                 ':manager_id' => $manager_id
//                 ':type' => $type,
//             ));
//             break;
        
//         default: 
//             echo ('eror type');
//             break;
//     }
//     var_dump($res);
// }
