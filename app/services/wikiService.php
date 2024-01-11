<?php
require_once(__DIR__.'/../config/database.php');


class wikiService{
    use database;
    public function addWikis(wiki $wiki){

        $conn = $this->connect();
        $wikiImage = $wiki->__get('wiki_image');
        $wikiTitle = $wiki->__get('wiki_title');
        $wikiContent = $wiki->__get('wiki_content');
        $wikiSummary = $wiki->__get('wiki_summarize');
        $wikiCategory = $wiki->__get('category_id');
        $wikiAuthor = $wiki->__get('author_id');
        $query = "INSERT INTO wiki (wiki_image,wiki_title,wiki_content,wiki_summarize,category_id, user_id ) VALUES (:image , :title ,:content,:summary,:categoryId,:userId)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":image", $wikiImage);
        $stmt->bindParam(":title", $wikiTitle);
        $stmt->bindParam("content", $wikiContent);
        $stmt->bindParam(":summary", $wikiSummary);
        $stmt->bindParam(":categoryId", $wikiCategory);
        $stmt->bindParam(":userId", $wikiAuthor);
        $stmt->execute();
        $id = $conn->lastInsertId();  
    
        return $id;
        
    }
    public function TagsOfWikis(WikisTags $wikiTgas){
    
        $conn = $this->connect();
      $wikiId =  $wikiTgas->__get('wiki_id');
       $tagId=  $wikiTgas->__get('tag_id');
    
        $query = "INSERT INTO wikitags (wiki_id,tag_id) VALUES (:wikiId , :TagId)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":wikiId", $wikiId);
        $stmt->bindParam(":TagId", $tagId);
        $stmt->execute();
    
    }

    public function selectWiki($id){

        $conn = $this->connect();
        $query ="SELECT * FROM wiki WHERE wiki_statut = FALSE AND user_id = :id
        ";
         $stmt = $conn->prepare($query);
         $stmt->bindParam(":id", $id);
         $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $wikis = array();
         foreach($result as $wiki){
            
    
     $wikis[] =   new wiki($wiki["wiki_id"], $wiki["wiki_image"], $wiki["wiki_title"],$wiki['wiki_content'],$wiki["wiki_summarize"],$wiki['created_at'], $wiki["category_id"],$wiki['user_id'],$wiki['wiki_statut']);
        }
    return $wikis;
    
    }



    public function deleteWiki($id){
        $conn = $this->connect();
        $query = "DELETE FROM Wiki WHERE wiki_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
        
    } 

