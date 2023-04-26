<?php

require "config.php";
require "./class/AdvertisementDaoMysql.php";

$AdvertisementDao = new AdvertisementDaoMysql($pdo);


$title = filter_input(INPUT_POST, 'title');
$category = filter_input(INPUT_POST, 'category');
$price = filter_input(INPUT_POST, 'price');
$description = filter_input(INPUT_POST, 'description');
$state = filter_input(INPUT_POST, 'state');
$modelYear = filter_input(INPUT_POST, 'model_year');
$mileage = filter_input(INPUT_POST, 'mileage');



if (!empty($title)) {

        $advertisement = new MyAdvertisement();
        $advertisement->setTitle($title);
        $advertisement->setIdCategory($category);
        $advertisement->setPrice($price);
        $advertisement->setDescription($description);
        $advertisement->setState($state);
        $advertisement->setModelYear($modelYear);
        $advertisement->setMileage($mileage);

        $AdvertisementDao->Addadvertisement($advertisement);



        header("Location: index.php");
        exit;
}
