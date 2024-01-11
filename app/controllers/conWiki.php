<?php
require_once(__DIR__.'/../services/wikiService.php');
require_once(__DIR__.'/../models/wiki.php');
require_once(__DIR__.'/../models/wikis_tags.php');

$WikisService = new wikiService();
if (isset($_POST["addWiki"])) {
    $wikiTitile = $_POST["Title"];
    $wikiSummary = $_POST["summary"];
    $wikiContent = $_POST["content"];
    $wikiCategory = $_POST['category'];
    $wikiAuthor = $_SESSION['user'];
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $WikiStatus = TRUE;
    $selectedTags = isset($_POST['nametag']) ? $_POST['nametag'] : array();
    $id = '';
    if ($wikiTitile !== '' && $wikiSummary !== '' && $wikiContent !== '' && $wikiCategory !== ''   ) {

     
            $wikis = new wiki($id, URLROOT . 'public/images/' . $image, $wikiTitile, $wikiContent, $wikiSummary, $created_at, $wikiCategory, $wikiAuthor, $WikiStatus);
            $wikiId =  $WikisService->addWikis($wikis);
            foreach ($selectedTags as $selectedTag) {
                $wikistags = new WikisTags($wikiId, $selectedTag);
                $WikisService->TagsOfWikis($wikistags);
            }
            header('Location: ../views/client/addWiki.php');
    
    } else {
        $_SESSION['error'] = 'Empty Input or invalid Information';
        header('Location: ../views/client/addWiki.php?error=true');
    }
}

$wikisAuteur = $WikisService->selectWiki($_SESSION['user']);
// var_dump($wikisAuteur);
if(isset($_POST["delete"])){
    $id = $_POST["delete"];
    $WikisService->deleteWiki($id);        
    header('Location: ../views/client/myWikis.php');
    exit;
}

$title='';
$description='';
$image='';
$content='';

if(isset($_POST["edit"])){
    $id = $_POST["edit"];
   $data = $wikiService->showWiki($id);  
   if($data){
    $_SESSION['wikis'] = $data;
    $_SESSION['idwiki'] = $id;
        header('Location: ../views/client/addWiki.php');

   }    
}  
   if(isset($_POST["updatewiki"])){
    $id = $_POST['updateWiki'];
    $titleWiki = $_POST["titleWiki"];
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $desc = $_POST["summarize"];
    $content= $_POST["content"];
    $category = '';
    $user ='';
    $idWiki='';
    $wikis = new wiki($id, URLROOT . 'public/images/' . $image, $titleWiki, $content, $desc, $created_at, $category, $user, $WikiStatus);
    $$WikisService->updateWiki($wiki,$id);
    unset($_SESSION['idwiki']);
    header('Location: ../views/client/myWikis.php');
}

?>