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

    public function selectTag(){
        $query ="SELECT * FROM tag";
        $conn= $this->connect();
        $stmt=$conn->prepare($query);
        $stmt->execute();
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
         $tags=array();
         foreach($result as $TAG){
            $tags[]= new tag ($TAG['tag_id'],$TAG['tag_name']);
         }
         return $tags;
    }




} 
    



?>