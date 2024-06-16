<?php

final class ReportPostsComposer implements CRUDInterface
{
  /**
   * getPosts for Select all reports
   * 
   * Getting all records of reports
   * 
   * @param $pdo Connecting to the database
   * 
   * @return json
  */
  public function getPosts($pdo){
    $statement = $pdo->query(SQL_GET_REPORTS);
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
   * @param $id Reports ID in the table
   * 
   * @return json
   */
  public function getPost($pdo, $id){
    $statement = $pdo->prepare(SQL_GET_REPORT);
    $statement->execute(array($id));
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    print_r(json_encode($result));
  }
    
  /**
   * addPost for Post add  
   * 
   * Adding an entry to the database
   * 
   * @param $pdo Connecting to the database
   * @param $data number, type, car_id, mileage, user_id
   * 
   * @return string
   */
  public function addPost($pdo, $data){
    $number = (isset($data['number'])) ?  $data['number'] : NULL;
    $type = (isset($data['type'])) ? $data['type'] : NULL;
    $car_id = (isset($data['car_id'])) ? $data['car_id'] : NULL;
    $mileage = (isset($data['mileage'])) ? $data['mileage'] : NULL;
    $user_id = (isset($data['user_id'])) ? $data['user_id'] : NULL;

    try {
      $statement = $pdo->prepare(SQL_INSERT_REPORT);
      $res = $statement->execute(array(
        ':number' => $number,
        ':type' => $type,
        ':mileage' => $mileage,
        ':car_id' => $car_id,
        ':user_id' => $user_id
      ));
      var_dump($res);
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }

  /**
   * deletePost function for Post delete 
   * 
   * Removing a post from the database
   * 
   * @param $pdo Connecting to the database
   * @param $id Post ID in the table
   * 
   * @return string
   */
  public function deletePost($pdo, $id){
    $statement = $pdo->prepare(SQL_DELETE_REPORT);
    $statement->execute(array($id));
  }
    
  /**
   * updatePost for Post update 
   * 
   * Updating a post in the database
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
}
