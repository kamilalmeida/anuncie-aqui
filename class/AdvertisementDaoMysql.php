<?php
require_once "./class/AdvertisementDaoMysql.php";
require "./class/MyAdvertisement.php";

class AdvertisementDaoMysql implements AdvertisementDao
{
    private $pdo;

    public function __construct(PDO $engine)
    {
        $this->pdo = $engine;
    }

    public function getAdvertisement()
    {

        $array = [];
        $sql = $this->pdo->prepare("SELECT *, (select advertisement_images.url from advertisement_images where advertisement_images.id_advertisement = advertisement.id limit 1) as url FROM advertisement WHERE id_user = :id_user");
        $sql->bindValue(':id_user', $_SESSION['cLogin']);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function Addadvertisement(MyAdvertisement $a)
    {
        $sql = $this->pdo->prepare("INSERT INTO advertisement SET title = :title, id_category = :id_category, id_user = :id_user, description = :description, price = :price, state = :state, model_year = :model_year, mileage = :mileage ");
        $sql->bindValue(':title', $a->getTitle());
        $sql->bindValue(':id_category', $a->getIdCategory());
        $sql->bindValue(':id_user', $_SESSION['cLogin']);
        $sql->bindValue(':description', $a->getDescription());
        $sql->bindValue(':price', $a->getPrice());
        $sql->bindValue(':state', $a->getState());
        $sql->bindValue(':model_year', $a->getModelYear());
        $sql->bindValue(':mileage', $a->getMileage());
        $sql->execute();
    }
}
