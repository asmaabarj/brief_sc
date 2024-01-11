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

?>