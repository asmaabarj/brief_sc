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









?>