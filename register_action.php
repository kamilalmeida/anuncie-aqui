<?php

require "config.php";
require "./class/UserDaoMysql.php";

$userDao = new UserDaoMysql($pdo);


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telephone = filter_input(INPUT_POST, 'telephone');
$password = filter_input(INPUT_POST, 'password');


if (!empty($name) && !empty($email) && !empty($password)) {
    if ($userDao->findByEmail($email) === false) {
        $newUser = new Users();
        $newUser->setName($name);
        $newUser->setEmail($email);
        $newUser->setTelephone($telephone);
        $newUser->setPassword($password);

        $userDao->addUser($newUser);



        header("Location: login.php");
        exit;
    }
} else {


    header("Location:register.php");
    exit;
}
?>