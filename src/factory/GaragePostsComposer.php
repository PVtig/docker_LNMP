<?php

final class GaragePostsComposer implements CRUDInterface
{
  /**
   * getPosts for Select all posts
   * 
   * Getting all records of a garages
   * 
   * @param $pdo Connecting to the database
   * @param $type Name of the entity type in the database
   * 
   * @return json
  */
  public function getPosts($pdo){
    $statement = $pdo->query(SQL_GET_GARAGES);
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
   * @param $id Garages ID in the table
   * 
   * @return json
   */
  public function getPost($pdo, $id){
    $statement = $pdo->prepare(SQL_GET_GARAGE);
    $statement->execute(array($id));
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    print_r(json_encode($result));
  }
    
  /**
   * addPost for garage add  
   * 
   * Adding an entry to the database
   * 
   * @param $pdo Connecting to the database
   * @param $data number, type, capacity, manager_id
   * 
   * @return string
   */
  public function addPost($pdo, $data){
    $number = (isset($data['number'])) ?  $data['number'] : NULL;
    $type = (isset($data['type'])) ? $data['type'] : NULL;
    $capacity = (isset($data['capacity'])) ? $data['capacity'] : NULL;
    $manager_id = (isset($data['manager_id'])) ? $data['manager_id'] : NULL;

    try {
        $statement = $pdo->prepare(SQL_INSERT_GARAGE);
        $res = $statement->execute(array(
            ':number' => $number,
            ':capacity' => $capacity,
            ':manager_id' => $manager_id,
            ':type' => $type
        ));
        var_dump($res);
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }

  /**
   * deletePost function for garage delete 
   * 
   * Removing a post from the database
   * 
   * @param $pdo Connecting to the database
   * @param $id Garage ID in the table
   * 
   * @return string
   */
  public function deletePost($pdo, $id){
    $statement = $pdo->prepare(SQL_DELETE_GARAGE);
    $statement->execute(array($id));
  }
    
  /**
   * updatePost for Garage update 
   * 
   * Updating a Garage in the database
   * 
   * @param $pdo Connecting to the database
   * @param $id Garage ID in the table
   * @param $data number, mileage, manager_id, type
   * 
   * @return string
   */
  public function updatePost($pdo, $id, $data){
    $number = (isset($data['number'])) ?  $data['number'] : NULL;
    $capacity = (isset($data['mileage'])) ? $data['mileage'] : NULL;
    $manager_id = (isset($data['manager_id'])) ? $data['manager_id'] : NULL;
    $type = (isset($data['type'])) ? $data['type'] : NULL;
    
    $statement = $pdo->prepare(SQL_UPDATE_GARAGE_BY_ID);
    $res = $statement->execute(array(
        ':number' => $number,
        ':capacity' => $capacity,
        ':manager_id' => $manager_id,
        ':type' => $type
    ));
    var_dump($res);
  }
}
