<?php require "./pages/header.php";
?>


<div class="anime-left form">
    <h1 class="title">Login</h1>

    <form action="login_action.php" method="POST">

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