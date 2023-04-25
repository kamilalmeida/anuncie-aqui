<?php
require "config.php";
// require "./class/UserDaoMysql.php";

// $userDao = new UserDaoMysql($pdo);
// $list = $userDao->findAll();

?>


<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <title>AnuncieAqui</title>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <header class="navbar-header">
                <a href="index.php" class="navbar-brand">AnuncieAqui</a>
            </header>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])) : ?>
                    <li class="cadastro"><a href="advertisement.php">Meus anúncios</a></li>
                    <li class="login"><a href="logout.php">Sair</a></li>
                <?php else : ?>
                    <li class="cadastro"><a href="index.php">Home</a></li>
                    <li class="cadastro"><a href="">Anúncios</a></li>
                    <li class="cadastro"><a href="register.php">Cadastre-se</a></li>
                    <li class="login"><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>

        </div>
    </nav>