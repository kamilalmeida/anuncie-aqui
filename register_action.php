<?php

require "config.php";
require "./class/UserDaoMysql.php";

$userDao = new UserDaoMysql($pdo);


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');




if ($name && $email && $password) {
    if ($userDao->findByEmail($email) === false) {
        $newUser = new Users();
        $newUser->setName($name);
        $newUser->setEmail($name);
        $newUser->setTelefone($name);
        $newUser->setPassword($name);
    }
} else {

    header("Location:register.php");
}
