<?php
class Advertisement{
    
    private $id;
    private $id_user;
    private $id_category;
    private $title;
    private $description;
    private $value;
    private $state;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = trim($id);
    }

    public function getTitle()
    {
        return $this->id;
    }

    public function setTitle($id)
    {
        $this->id = trim($id);
    }

}