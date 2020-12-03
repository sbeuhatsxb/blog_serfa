<?php
namespace Model\Entity;
use \Datetime;

class ArticleEntity
{
    private $id;
    private $title;
    private $img;
    private $content;
    private $author;
    private $createdAt;


    function __construct() {
    }

    public function hydrate($array){
        $this->setId($array['article_id']);
        $this->setTitle($array['article_title']);
        $this->setImg($array['article_img']);
        $this->setContent($array['article_content']);
        $this->setAuthor($array['article_creator']);
        $this->setCreatedAt($array['article_createdate']);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return UserEntity
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param UserEntity $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return Datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param Datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }


}