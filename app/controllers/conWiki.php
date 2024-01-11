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
?>