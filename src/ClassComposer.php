<?php

class ClassComposer implements CRUD{
    
    /**
     * 
     * Fetch from DB accepts 
     * 
     * @param $pdo Connecting to the database
     * @param $type Name of the entity type in the database
     * @param $id Post ID in the table
     * 
     * @return json
     */
  public function get($pdo, $type, $id){
        if (isset($id)) {
            getPost($pdo, $id, $type);
        } else {
            getPosts($pdo, $type);
        }
    }

    /**
     * Fetch from DB accepts 
     * 
     * @param $pdo Connecting to the database
     * @param $data Data for creating a post
     * @param $type Name of the entity type in the database
     * 
     * @return json
     */
  public function add($pdo, $data, $type){
        addPost($pdo, $data, $type);
        $mes = [
            "status" => true,
            "message" => "Post '$type' is add"
        ];
        print_r(json_encode($mes));
    }

    /**
     * Past delete 
     * 
     * @param $pdo Connecting to the database
     * @param $id Post ID in the table
     * @param $type Name of the entity type in the database
     * 
     * @return json
     */
  public function delete($pdo, $id, $type){
        deletePost($pdo, $id, $type);
        http_response_code(200);
        $mes = [
            "status" => true,
            "message" => "Post '$type' '$id' is delete"
        ];
        print_r(json_encode($mes));
    }

    /**
     * Post update
     * 
     * @param $pdo Connecting to the database
     * @param $id Post ID in the table
     * @param $data Data for replacement 
     * @param $type Name of the entity type in the database
     * 
     * @return json
     */
  public function update($pdo, $id, $data, $type){
        updatePost($pdo, $id, $data, $type);
        http_response_code(200);
        $mes = [
            "status" => true,
            "message" => "Post '$type' '$id' is update"
        ];
        print_r(json_encode($mes));
        
    }
}