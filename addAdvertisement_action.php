<?php

require "config.php";
require "./class/AdvertisementDaoMysql.php";

$AdvertisementDao = new AdvertisementDaoMysql($pdo);


$title = filter_input(INPUT_POST, 'title');
$category = filter_input(INPUT_POST, 'category');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description');
$state = filter_input(INPUT_POST, 'state');
$modelYear = filter_input(INPUT_POST, 'model_year');
$mileage = filter_input(INPUT_POST, 'mileage');
$photos = $_FILES['photos'];

if (isset($_FILES['photos'])) {
        $photos = $_FILES['photos'];
} else {
        $photos = [];
}

if (!empty($title)) {

        $advertisement = new MyAdvertisement();
        $advertisement->setTitle($title);
        $advertisement->setIdCategory($category);
        $advertisement->setPrice($price);
        $advertisement->setDescription($description);
        $advertisement->setState($state);
        $advertisement->setModelYear($modelYear);
        $advertisement->setMileage($mileage);
        $advertisement->setPhotos($photos);

        $AdvertisementDao->addAdvertisement($advertisement);


        header("Location: advertisement.php");
        exit;
}else{
        header("Location:addAdvertisement.php");
}
