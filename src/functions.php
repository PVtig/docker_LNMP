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
        case 'event':
            $statement = $pdo->query(SQL_GET_EVENTS);
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
        case 'event':
            $statement = $pdo->prepare(SQL_GET_EVENT);
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

function addPost($pdo, $data, $variable)
{
    $name = (isset($data['name'])) ?  $data['name'] : NULL;
    $surname = (isset($data['surname'])) ?  $data['surname'] : NULL;
    $salary = (isset($data['salary'])) ? $data['salary'] : NULL;
    $phone = (isset($data['phone'])) ? $data['phone'] : NULL;
    $email = (isset($data['email'])) ? $data['email'] : NULL;
    $number = (isset($data['number'])) ?  $data['number'] : NULL;
    $type = (isset($data['type'])) ? $data['type'] : NULL;
    $status = (isset($data['status'])) ? $data['status'] : NULL;
    $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;
    $car_id = (isset($data['car_id'])) ? $data['car_id'] : NULL;
    $user_id = (isset($data['user_id'])) ? $data['user_id'] : NULL;
    $capacity = (isset($data['capacity'])) ? $data['capacity'] : NULL;
    $manager_id = (isset($data['manager_id'])) ? $data['manager_id'] : NULL;
    $garage_id = (isset($data['garage_id'])) ? $data['garage_id'] : NULL;
    $title = (isset($data['title'])) ?  $data['title'] : NULL;
    $description = (isset($data['description'])) ?  $data['description'] : NULL;
    $date = (isset($data['date'])) ?  $data['date'] : NULL;

//     /* Choice where we knock */
try {
    switch ($variable) {
        case 'user':
            $stmt = $pdo->prepare(SQL_INSERT_USER);
            $res = $stmt->execute(array(
                ':name' => $name,
                ':surname' => $surname,
                ':phone' => $phone,
                ':email' => $email,
                ':salary' => $salary,
                ':type' => $type
            ));
            break;
        case 'car':
            $statement = $pdo->prepare(SQL_INSERT_CAR);
            $res = $statement->execute(array(
                ':number' => $number,
                ':type' => $type,
                ':mileage' => $mileage,
                ':garage_id' => $garage_id,
                ':status' => $status
            ));
            break;
        case 'report':
            $statement = $pdo->prepare(SQL_INSERT_REPORT);
            $res = $statement->execute(array(
                ':number' => $number,
                ':type' => $type,
                ':mileage' => $mileage,
                ':car_id' => $car_id,
                ':user_id' => $user_id
            )
            );
            break;
        case 'garage':
            $statement = $pdo->prepare(SQL_INSERT_GARAGE);
            $res = $statement->execute(array(
                ':number' => $number,
                ':capacity' => $capacity,
                ':manager_id' => $manager_id,
                ':type' => $type
            ));
            break;
        
        case 'event':
            $statement = $pdo->prepare(SQL_INSERT_EVENT);
            $res = $statement->execute(array(
                ':title' => $title,
                ':description' => $description,
                ':date' => $date
            ));
            break;
        default: 
            echo ('eror type dont valid');
            break;
    }
    var_dump($res);
} catch (PDOException $exception) {
    echo $exception->getMessage();
}
}

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
