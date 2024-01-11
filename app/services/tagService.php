<?php
require_once(__DIR__.'/../config/database.php');



class tagService{
    use database;

    public function addTag(tag $tag){
    $conn= $this->connect();
    $name = $tag->__get('tag_name');


    $query ="INSERT INTO tag (tag_name) VALUES (:name)";
    $stmt=$conn->prepare($query);
    $stmt->bindParam(":name",$name);
    $stmt->execute();


    }

    
    }



?>