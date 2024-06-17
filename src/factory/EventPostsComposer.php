<?php

final class EventPostsComposer implements CRUDInterface
{
  /**
   * getPosts for Select all events
   * 
   * Getting all events
   * 
   * @param $pdo Connecting to the database
   * 
   * @return json
  */
  public function getPosts($pdo){

    $statement = $pdo->query(SQL_GET_EVENTS);
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
   * @param $id Event ID in the table
   * 
   * @return json
   */
  public function getPost($pdo, $id){

    $statement = $pdo->prepare(SQL_GET_EVENT);
    $statement->execute(array($id));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($result));
  }
    
  /**
   * addPost for event add  
   * 
   * Adding an entry to the database
   * 
   * @param $pdo Connecting to the database
   * @param $data title, description, date
   * 
   * @return string
   */
  public function addPost($pdo, $data){

    $title = (isset($data['title'])) ?  $data['title'] : NULL;
    $description = (isset($data['description'])) ? $data['description'] : NULL;
    $date = (isset($data['date'])) ? $data['date'] : NULL;

    try {
        $statement = $pdo->prepare(SQL_INSERT_EVENT);
        $res = $statement->execute(array(
            ':title' => $title,
            ':description' => $description,
            ':date' => $date
        ));
    var_dump($res);
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
  }

  /**
   * deletePost function for event delete 
   * 
   * Removing a event from the database
   * 
   * @param $pdo Connecting to the database
   * @param $id Post ID in the table
   * 
   * @return string
   */
  public function deletePost($pdo, $id){}
    
  /**
   * updatePost for event update 
   * 
   * Updating a post in the database
   * 
   * @param $pdo Connecting to the database
   * @param $id Post ID in the table
   * @param $data
   * 
   * @return string
   */
  public function updatePost($pdo, $id, $data){}
}
