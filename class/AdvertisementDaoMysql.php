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
    public function getAdvertisementId($id)
    {
        $array = [];

        $sql = $this->pdo->prepare("SELECT * FROM advertisement WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function addAdvertisement(MyAdvertisement $a)
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

     

        // if (count($a->getPhotos()) > 0) {
 
  
        //     for ($q = 0; $q < count($a->getPhotos()['tmp_name']); $q++) {
        //         $type = $a->getPhotos()['type'][$q];
        //         if (in_array($type, array('image/jpeg', 'image/png'))) {
        //             $tmp_name = md5(time().rand(0,9999)).'.jpg';
        //             move_uploaded_file($a->getPhotos()['tmp_name'][$q], 'assets/img/advertisement/'.$tmp_name);

        //             list($width_orig, $height_orig) = getimagesize('assets/img/advertisement/'.$tmp_name);

        //             $ratio = $width_orig / $height_orig;

        //             $width = 500;
        //             $height = 500;

        //             if ($width/$height > $ratio) {
        //                 $width = $height * $ratio;
        //             } else {
        //                 $height = $width / $ratio;
        //             }

        //             $img  = imagecreatetruecolor($width, $height);
        //             if ($type == 'image/jpeg') {
        //                 $orig = imagecreatefromjpeg('assets/img/advertisement/'.$tmp_name);
                     
        //             } elseif ($type == 'image/png') {
        //                 $orig = imagecreatefrompng('assets/img/advertisement/'.$tmp_name);
        //             }

        //             imagecopyresampled($img, $orig, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        //             imagejpeg($img, 'assets/img/advertisement/'.$tmp_name, 80);

        //             $sql = $this->pdo->prepare("INSERT INTO advertisement_images SET id_advertisement = :id_advertisement, url = :url");
        //             $sql->bindValue(':id_advertisement', $a->getId());
        //             $sql->bindValue(':url', $tmp_name);
        //             $sql->execute();
        //         }
        //     }
        // }
    }
    public function editAdvertisement(MyAdvertisement $a)
    {
        $sql = $this->pdo->prepare("UPDATE advertisement SET title = :title, id_category = :id_category, id_user = :id_user, description = :description, price = :price, state = :state, model_year = :model_year, mileage = :mileage WHERE id = :id");
        $sql->bindValue(':title', $a->getTitle());
        $sql->bindValue(':id_category', $a->getIdCategory());
        $sql->bindValue(':id_user', $_SESSION['cLogin']);
        $sql->bindValue(':description', $a->getDescription());
        $sql->bindValue(':price', $a->getPrice());
        $sql->bindValue(':state', $a->getState());
        $sql->bindValue(':model_year', $a->getModelYear());
        $sql->bindValue(':mileage', $a->getMileage());
        $sql->bindValue(':id', $a->getId());
        $sql->execute();


         if (count($a->getPhotos()) > 0) {
 
  
            for ($q = 0; $q < count($a->getPhotos()['tmp_name']); $q++) {
                $type = $a->getPhotos()['type'][$q];
                if (in_array($type, array('image/jpeg', 'image/png'))) {
                    $tmp_name = md5(time().rand(0,9999)).'.jpg';
                    move_uploaded_file($a->getPhotos()['tmp_name'][$q], 'assets/img/advertisement/'.$tmp_name);

                    list($width_orig, $height_orig) = getimagesize('assets/img/advertisement/'.$tmp_name);

                    $ratio = $width_orig / $height_orig;

                    $width = 500;
                    $height = 500;

                    if ($width/$height > $ratio) {
                        $width = $height * $ratio;
                    } else {
                        $height = $width / $ratio;
                    }

                    $img  = imagecreatetruecolor($width, $height);
                    if ($type == 'image/jpeg') {
                        $orig = imagecreatefromjpeg('assets/img/advertisement/'.$tmp_name);
                     
                    } elseif ($type == 'image/png') {
                        $orig = imagecreatefrompng('assets/img/advertisement/'.$tmp_name);
                    }

                    imagecopyresampled($img, $orig, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagejpeg($img, 'assets/img/advertisement/'.$tmp_name, 80);

                    $sql = $this->pdo->prepare("INSERT INTO advertisement_images SET id_advertisement = :id_advertisement, url = :url");
                    $sql->bindValue(':id_advertisement', $a->getId());
                    $sql->bindValue(':url', $tmp_name);
                    $sql->execute();
                }
            }
        }

   
    }


    public function deleteAdvertisement($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM advertisement_images WHERE id_advertisement = :id_advertisement");
        $sql->bindValue(':id_advertisement', $id);
        $sql->execute();

        $sql = $this->pdo->prepare("DELETE FROM advertisement WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
