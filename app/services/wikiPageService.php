<?php
require_once(__DIR__.'/../config/database.php');


class wikipageService{
    use database;


    public function getWiki($id)
{
    $conn = $this->connect();
    $query = "SELECT wiki.*, tag.tag_name, category.category_name, users.user_fullname
        FROM wiki 
        JOIN wikitags ON wiki.wiki_id = wikitags.wiki_id
        JOIN tag ON tag.tag_id = wikitags.tag_id 
        JOIN users ON wiki.user_id = users.user_id
        LEFT JOIN category ON wiki.category_id = category.category_id
        WHERE wiki.wiki_statut = FALSE AND wiki.wiki_id = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        $wiki = array(
            'wiki_id' => $result[0]["wiki_id"],
            'wiki_image' => $result[0]["wiki_image"],
            'wiki_title' => $result[0]["wiki_title"],
            'wiki_content' => $result[0]['wiki_content'],
            'wiki_summarize' => $result[0]["wiki_summarize"],
            'created_at' => $result[0]['created_at'],
            'category_id' => $result[0]["category_id"],
            'user_id' => $result[0]['user_id'],
            'wiki_statut' => $result[0]['wiki_statut'],
            'tags' => array(),
            'category' => $result[0]['category_name'],
            'username' => $result[0]['user_fullname'],
        );

        foreach ($result as $row) {
            $wiki['tags'][] = $row['tag_name'];
        }

        return $wiki;
    } else {
        return null; 
    }
}
}
    ?>