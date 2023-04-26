<?php require "./pages/header.php";
?>


<div class="anime-left form">
    <h1 class="title">Login</h1>
    <?php
    require "./class/UserDaoMysql.php";

    $userDao = new UserDaoMysql($pdo);

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');

    if (isset($_POST['email'])) {
        if ($userDao->login($email, $password)) {
    ?>
            <script type="text/javascript">
                window.location.href = "index.php";
            </script>
        <?php
        } else {
        ?>
            <p class="alert">Usuário e/ou senha incorretos</p>
    <?php
        }
    }
    ?>

    <form method="POST">

        <div class="wrapper">
            <label for="email" class="label">
                Email:
            </label>
            <input type="email" name="email" id="email" class="input">
        </div>

        <div class="wrapper">
            <label for="password">
                Senha:
            </label>
            <input type="password" name="password" id="password" class="input">
        </div>
        <input type="submit" value="Fazer login" class="btn-register">
    </form>
</div>

<?php require "./pages/footer.php" ?>