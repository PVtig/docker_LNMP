<?php


/* Select all posts function 
    (Connection, post type) */

function getPosts($pdo, $type)
{
    /* Choice where we knock */
    if ($type == "user") {
        $statement = $pdo->query(SQL_GET_DRIVERS);
    } else if ($type == "car") {
        $statement = $pdo->query(SQL_GET_CARS);
    } else {
        echo ('eror type');
    }
    /* Retrieving and Translating Result Set Rows */
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($result);
    print_r($json);
}


/* The function of selecting one post by number 
    (Connection, post ID in the table, post type) */

function getPost($pdo, $id, $variable)
{
    /* Choice where we knock */
    if ($variable == "user") {
        $statement = $pdo->prepare(SQL_GET_DRIVER);
    } else if ($variable == "car") {
        $statement = $pdo->prepare(SQL_GET_CAR);
    } else {
        echo ('eror type');
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
    $surname = ($data['surname']) ? $data['surname'] : NULL;
    $salary = (isset($data['salary'])) ? $data['salary'] : NULL;
    $number = (isset($data['number'])) ?  $data['number'] : NULL;
    $type = (isset($data['type'])) ? $data['type'] : NULL;
    $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;

    /* Choice where we knock */
    if ($variable == "user") {
        $stmt = $pdo->prepare(SQL_INSERT_DRIVER);
        $res = $stmt->execute(array(
            ':name' => $name,
            ':surname' => $surname,
            ':salary' => $salary
        ));
    } else if ($variable == "car") {
        $statement = $pdo->prepare(SQL_INSERT_CAR);
        $res = $statement->execute(array(
            ':number' => $number,
            ':type' => $type,
            ':mileage' => $mileage
        ));
    } else {
        echo ('eror type');
    }
    var_dump($res);
}

/* Post delete function 
        (Connect, post ID, post type) */
function deletePost($pdo, $id, $variable)
{

    /* Choice where we knock */
    if ($variable == "user") {
        $statement = $pdo->prepare(SQL_DELETE_DRIVER);
    } else if ($variable == "car") {
        $statement = $pdo->prepare(SQL_DELETE_CAR);
    } else {
        echo ('eror type');
    }
    $statement->execute(array($id));
}


/**
 * Post update function 
 * (Connect, post ID, data array, post type)
 * 
 */
function updatePost($pdo, $id, $data, $variable)
{
    $name = (isset($data['name'])) ?  $data['name'] : NULL;
    $surname = ($data['surname']) ? $data['surname'] : NULL;
    $salary = (isset($data['salary'])) ? $data['salary'] : NULL;
    $number = (isset($data['number'])) ?  $data['number'] : NULL;
    $type = (isset($data['type'])) ? $data['type'] : NULL;
    $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;


    if ($variable == "user") {
        $stmt = $pdo->prepare(SQL_UPDATE_DRIVER_BY_ID);
        $res = $stmt->execute(array(
            ':name' => $name,
            ':surname' => $surname,
            ':salary' => $salary,
            ':id' => $id
        ));
    } else if ($variable == "car") {
        $statement = $pdo->prepare(SQL_UPDATE_CAR_BY_ID);
        $res = $statement->execute(array(
            ':number' => $number,
            ':type' => $type,
            ':mileage' => $mileage,
            ':id' => $id
        ));
    } else {
        echo ('eror type');
    }
    var_dump($res);
}
