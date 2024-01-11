<?php
require_once(__DIR__.'/../config/database.php');


class categoryService{
    use database;

    public function addCat(category $category){
    $conn= $this->connect();
    $name = $category->__get('category_name');
    $desc = $category->__get('category_desc');
    $image = $category->__get('category_image');


    $query ="INSERT INTO category (category_name,category_desc,category_image) VALUES (:name,:desc,:image)";
    $stmt=$conn->prepare($query);
    $stmt->bindParam(":name",$name);
    $stmt->bindParam(":desc",$desc);
    $stmt->bindParam(":image",$image);
    $stmt->execute();


    }

    public function selectCat(){
        $query ="SELECT * FROM category";
        $conn= $this->connect();
        $stmt=$conn->prepare($query);
        $stmt->execute();
        $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
         $categories=array();
         foreach($result as $CATEGORIE){
            $categories[]= new Category ($CATEGORIE['category_id'],$CATEGORIE['category_name'],$CATEGORIE['category_desc'],$CATEGORIE['category_image']);
         }
         return $categories;
    }


    public function showCat($id){
        $query ="SELECT * FROM category WHERE category_id = :id";
        $conn= $this->connect();
        $stmt=$conn->prepare($query);
        $stmt->bindParam(":id",$id);

        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $name=$result["category_name"];
        $description=$result["category_desc"];
        $image=$result["category_image"];
        return [$name,$description,$image];
    }


    public function updateCat(category $category,$id){
        $conn = $this->connect();
        $name = $category->__get('category_name');
        $description = $category->__get('category_desc');
        $image = $category->__get('category_image');
    
        $query = "UPDATE category SET category_name = :name, category_desc = :description, category_image = :image WHERE category_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":image", $image);
        $stmt->execute();
    }


public function deleteCat($id){
    $conn = $this->connect();
    $query = "DELETE FROM category WHERE category_id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}
    
} 


?>