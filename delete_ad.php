<?php
require "./class/AdvertisementDaoMysql.php";
require "./config.php";

session_start();

if (empty($_SESSION['cLogin'])) {
    header("Location: login.php");
}

$advertisementDao = new AdvertisementDaoMysql($pdo);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $advertisementDao->deleteAdvertisement($_GET['id']);
}

header("Location:advertisement.php");
exit;
