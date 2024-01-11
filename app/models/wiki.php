<?php


class wiki{

    private $id;
    private $wiki_image;
    private $wiki_title;
    private $wiki_content;
    private $wiki_summarize;
    private $created_at;
    private $category_id;
    private $author_id;
    private $wiki_statut;
    

    public function __construct($id, $wiki_image, $wiki_title, $wiki_content, $wiki_summarize, $category_id, $author_id, $wiki_statut){  

        $this->id = $id;
        $this->wiki_image = $wiki_image;
        $this->wiki_title = $wiki_title;
        $this->wiki_content = $wiki_content;
        $this->wiki_summarize = $wiki_summarize;
        $this->category_id = $category_id;
        $this->author_id = $author_id;
        $this->wiki_statut = $wiki_statut;
          }


public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
}

public function __set($property, $value) {
    if (property_exists($this, $property)) {
        $this->$property = $value;
    }

}
}

?>