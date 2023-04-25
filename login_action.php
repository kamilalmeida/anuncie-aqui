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
        $userDao->login($email, $password);


        header("Location: index.php");
        exit;
    }
} else {
?>
    <div>Preencha todos os campos</div>
<?php

    header("Location:register.php");
    exit;
}
?>