<?php

final class CarPostsComposer implements CRUDInterface
{
  /**
   * getPosts for Select all posts
   * 
   * Getting all cars
   * 
   * @param $pdo Connecting to the database
   * 
   * @return json
  */
  public function getPosts($pdo){
    $statement = $pdo->query(SQL_GET_CARS);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($result);
    print_r($json);
  }
    
  /**
   * getPost for Fetch from DB accepts
   * 
   * Retrieving a specific record from a database
   * 
   * @param $pdo Connecting to the database
   * @param $id Post ID in the table
   * 
   * @return json
   */
  public function getPost($pdo, $id){
    $statement = $pdo->prepare(SQL_GET_CAR);
    $statement->execute(array($id));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($result));
  }
    
  /**
   * addPost for car add  
   * 
   * Adding an entry to the database
   * 
   * @param $pdo Connecting to the database
   * @param $data number, type, status, mileage, garage_id
   * 
   * @return string
   */
  public function addPost($pdo, $d){
    $number = (isset($data['number'])) ?  $data['number'] : NULL;
    $type = (isset($data['type'])) ? $data['type'] : NULL;
    $status = (isset($data['status'])) ? $data['status'] : NULL;
    $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;
    $garage_id = (isset($data['garage_id'])) ? $data['garage_id'] : NULL;

    try {
      $statement = $pdo->prepare(SQL_INSERT_CAR);
      $res = $statement->execute(array(
        ':number' => $number,
        ':type' => $type,
        ':mileage' => $mileage,
        ':garage_id' => $garage_id,
        ':status' => $status
      ));
      var_dump($res);
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }

  /**
   * deletePost function for car 
   * 
   * Removing a post from the database
   * 
   * @param $pdo Connecting to the database
   * @param $id Car ID in the table
   * 
   * @return string
   */
  public function deletePost($pdo, $id){
    $statement = $pdo->prepare(SQL_DELETE_CAR);
    $statement->execute(array($id));
  }
    
  /**
   * updatePost for car update 
   * 
   * Updating a car in the database
   * 
   * @param $pdo Connecting to the database
   * @param $id Post ID in the table
   * @param $data number, type, mileage
   * 
   * @return string
   */
  public function updatePost($pdo, $id, $data){
    $number = (isset($data['number'])) ?  $data['number'] : NULL;
    $type = (isset($data['type'])) ? $data['type'] : NULL;
    $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;
    $statement = $pdo->prepare(SQL_UPDATE_CAR_BY_ID);

    $res = $statement->execute(array(
      ':number' => $number,
      ':type' => $type,
      ':mileage' => $mileage
    ));
    var_dump($res);
  }
};