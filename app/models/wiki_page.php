<?php


class wikiPage{

    private $id;
    private $wiki_image;
    private $wiki_title;
    private $wiki_content;
    private $wiki_tags;
    private $created_at;
    private $category_id;
    private $category_name;
    private $author_name;

    

    public function __construct($id, $wiki_image, $wiki_title, $wiki_content, $wiki_tags, $created_at, $category_id, $category_name, $author_name){  

        $this->id = $id;
        $this->wiki_image = $wiki_image;
        $this->wiki_title = $wiki_title;
        $this->wiki_content = $wiki_content;
        $this->wiki_tags = $wiki_tags;
        $this->created_at = $created_at;
        $this->category_id = $category_id;
        $this->category_name = $category_name;
        $this->author_name = $author_name;
          }


public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
}

}

?>