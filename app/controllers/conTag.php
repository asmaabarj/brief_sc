<?php
require_once(__DIR__.'/../services/tagService.php');
require_once(__DIR__.'/../models/tag.php');


$tagService = new tagService();

if(isset($_POST["addTag"])){
   $nameTag = $_POST["nameTag"];
   $idTag='';
   $tag = new tag($idTag, $nameTag );
   $tagService->addTag($tag);
   header('Location: ../views/admin/manageTag.php');


}
$result=$tagService->selectTag();

if(isset($_POST["delete"])){
    $id = $_POST["delete"];
    $tagService->deleteTag($id);        
    header('Location: ../views/admin/manageTag.php');
    exit;
}

$name='';

if(isset($_POST["edit"])){
    $id = $_POST["edit"];
   $data = $tagService->showTag($id);  
   if($data){
    $_SESSION['tags'] = $data;
    $_SESSION['idtag'] = $id;
        header('Location: ../views/admin/manageCategory.php');

   }  
}


if(isset($_POST["updateCat"])){
    $nameTag = $_POST["nameTag"];
    $idTag='';
    $tag = new tag($idTag, $nameTag );
    $tagService->addTag($tag);
    header('Location: ../views/admin/manageTag.php');

}





?>