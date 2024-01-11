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


    public function upDateCat(){
        $query ="SELECT * FROM category";

    }


    public function deleteCat(){
        $query ="DELETE * FROM category WHERE category_id =:id";

    }
} 


?>