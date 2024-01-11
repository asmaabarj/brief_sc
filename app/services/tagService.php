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

    public function showTag($id){
        $query ="SELECT * FROM tag WHERE tag_id = :id";
        $conn= $this->connect();
        $stmt=$conn->prepare($query);
        $stmt->bindParam(":id",$id);

        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $name=$result["tag_name"];
        return [$name];
    }


    public function updateTag(category $tag,$id){
        $conn = $this->connect();
        $name = $tag->__get('tag_name');
    
        $query = "UPDATE tag SET tag_name = :name";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->execute();
    }

    public function deleteTag($id){
        $conn = $this->connect();
        $query = "DELETE FROM tag WHERE tag_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }


} 
    



?>