<?php

final class UserPostsComposer implements CRUDInterface
{
  /**
   * getPosts for Select all posts
   * 
   * Getting all records of a User
   * 
   * @param $pdo Connecting to the database
   * 
   * @return json
  */
  public function getPosts($pdo){
    $statement = $pdo->query(SQL_GET_USERS);
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
   * @param $id User ID in the table
   * 
   * @return json
   */
  public function getPost($pdo, $id){
    $statement = $pdo->prepare(SQL_GET_USER);
    $statement->execute(array($id));
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    print_r(json_encode($result));
  }
    
  /**
   * addPost for User add  
   * 
   * Adding an entry to the database
   * 
   * @param $pdo Connecting to the database
   * @param $data User creation data
   * 
   * @return string
   */
  public function addPost($pdo, $data){
    $name = (isset($data['name'])) ?  $data['name'] : NULL;
    $surname = (isset($data['surname'])) ?  $data['surname'] : NULL;
    $salary = (isset($data['salary'])) ? $data['salary'] : NULL;
    $phone = (isset($data['phone'])) ? $data['phone'] : NULL;
    $email = (isset($data['email'])) ? $data['email'] : NULL;
    $type = (isset($data['type'])) ? $data['type'] : NULL;

    try {
      $stmt = $pdo->prepare(SQL_INSERT_USER);
      $res = $stmt->execute(array(
        ':name' => $name,
        ':surname' => $surname,
        ':phone' => $phone,
        ':email' => $email,
        ':salary' => $salary,
        ':type' => $type
      ));
      var_dump($res);
    } catch (PDOException $exception) {
    echo $exception->getMessage();
    }
  }

  /**
   * DeletePost function for User delete 
   * 
   * Removing a User from the database
   * 
   * @param $pdo Connecting to the database
   * @param $id Post ID in the table
   * 
   * @return string
   */
  public function deletePost($pdo, $id){
    $statement = $pdo->prepare(SQL_DELETE_USER);
    $statement->execute(array($id));
  }
    
  /**
   * UpdatePost for User update 
   * 
   * Updating a User in the database
   * 
   * @param $pdo Connecting to the database
   * @param $id User ID in the table
   * @param $data
   * 
   * @return string
   */
  public function updatePost($pdo, $id, $data){
    $name = (isset($data['name'])) ?  $data['name'] : NULL;
    $surname = ($data['surname']) ? $data['surname'] : NULL;
    $salary = (isset($data['salary'])) ? $data['salary'] : NULL;

    try {
    $stmt = $pdo->prepare(SQL_UPDATE_USER_BY_ID);
    $res = $stmt->execute(array(
        ':name' => $name,
        ':surname' => $surname,
        ':salary' => $salary
        ));

    var_dump($res);
  } catch (PDOException $exception) {
  echo $exception->getMessage();
  }
  }
};
