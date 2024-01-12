<?php
require_once(__DIR__.'/../services/wikipageService.php');


$WikipageService = new wikipageService();

if(isset($_POST["show"])) {
    $_SESSION["show"] = isset($_POST["show"]) ? $_POST["show"] :'';


    header('Location: '.URLROOT. 'app/views/client/article.php');

    }
    $id = isset($_SESSION["show"]) ? $_SESSION["show"] :'';

$wiki = $WikipageService->getWiki($id);


?>

?>