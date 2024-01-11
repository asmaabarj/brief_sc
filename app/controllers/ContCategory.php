<?php
require_once(__DIR__.'/../services/categoryService.php');
require_once(__DIR__.'/../models/category.php');


$categoryService = new categoryService();

if(isset($_POST["addCat"])){
   $nameCat = $_POST["nameCat"];
   $image = $_FILES["image"]["name"];
   $tempname = $_FILES["image"]["tmp_name"];
   $desc = $_POST["desc"];
   $idCat='';
   $category = new category($idCat, $nameCat, $desc, URLROOT.'public/images/'. $image);
   $categoryService->addCat($category);
   header('Location: ../views/admin/manageCategory.php');

}
$result=$categoryService->selectCat();


// var_dump($result);
if(isset($_POST["delete"])){
    $id = $_POST["delete"];
    $categoryService->deleteCat($id);        
    header('Location: ../views/admin/manageCategory.php');
    exit;
}

$name='';
$description='';
$image='';
if(isset($_POST["edit"])){
    $id = $_POST["edit"];
   $data = $categoryService->showCat($id);  
   if($data){
    $_SESSION['categories'] = $data;
    $_SESSION['idcat'] = $id;
        header('Location: ../views/admin/manageCategory.php');

   }    
}  
   var_dump($_POST);
   if(isset($_POST["updateCat"])){
    $id = $_POST['updateCat'];
    $nameCat = $_POST["nameCat"];
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $desc = $_POST["desc"];
    $idCat='';
    $category = new category($idCat, $nameCat, $desc, URLROOT.'public/images/'. $image);
    $categoryService->updateCat($category,$id);
    unset($_SESSION['idcat']);
    header('Location: ../views/admin/manageCategory.php');
}


    ?>