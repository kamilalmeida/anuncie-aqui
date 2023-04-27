<?php
class MyAdvertisement
{

    private $id;
    private $id_user;
    private $id_category;
    private $title;
    private $description;
    private $price;
    private $state;
    private $model_year;
    private $mileage;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = trim($id);
    }
    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setIdUser($id_user)
    {
        $this->id_user = trim($id_user);
    }

    public function getIdCategory()
    {
        return $this->id_category;
    }

    public function setIdCategory($id_category)
    {
        $this->id_category = trim($id_category);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = trim($title);
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = trim($description);
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = trim($price);
    }

    public function getstate()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = trim($state);
    }
    public function getModelYear()
    {
        return $this->model_year;
    }

    public function setModelYear($model_year)
    {
        $this->model_year = $model_year;
    }
    public function getMileage()
    {
        return $this->mileage;
    }

    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
    }
}

interface AdvertisementDao
{
    public function getAdvertisement();
    public function Addadvertisement(MyAdvertisement $a);
    public function getAdvertisementId($id);
    public function editAdvertisement(MyAdvertisement $a);
    public function deleteAdvertisement($id);
}
