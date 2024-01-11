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









?>