<?php

class Category
{
    private $id;
    private $name;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = trim($id);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = ucwords(trim($name));
    }
}

interface CategoryDao
{
    public function getListCategory();
}
