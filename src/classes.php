<?php

class Crud implements CRUD
{
    /* Fetch from DB accepts 
    (Connection, post type, ID) */

    public function get($pdo, $type, $id)
    {
        if (isset($id)) {
            getPost($pdo, $id, $type);
        } else {
            getPosts($pdo, $type);
        }
    }


    /* DB add  
    (Connection, data array, post type) */

    public function add($pdo, $data, $type)
    {
        addPost($pdo, $data, $type);
        $mes = [
            "status" => true,
            "message" => "Post '$type' is add"
        ];
        print_r(json_encode($mes));
    }


    /* DB delete
    (Connection, post id, post type) */

    function delete($pdo, $id, $type)
    {
        deletePost($pdo, $id, $type);
        http_response_code(200);
        $mes = [
            "status" => true,
            "message" => "Post '$type' '$id' is delete"
        ];
        print_r(json_encode($mes));
    }


    /* DB delete
    (Connection, post id, post type) */

    function update($pdo, $id, $data, $type)
    {

        updatePost($pdo, $id, $data, $type);
        http_response_code(200);
        $mes = [
            "status" => true,
            "message" => "Post '$type' '$id' is update"
        ];
        print_r(json_encode($mes));
    }
}
