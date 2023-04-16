<?php require "./pages/header.php"; ?>


<div class="anime-left form">
    <h1 class="title">Cadastre-se</h1>

 
    
    <form action="register_action.php" method="POST">

        <div class="wrapper">
            <label for="nome" class="label">
                Nome:
            </label>
            <input type="text" name="name" id="nome" class="input">
        </div>

        <div class="wrapper">
            <label for="email">
                Email:
            </label>
            <input type="email" name="email" id="email" class="input">
        </div>

        <div class="wrapper">
            <label for="telephone">
                Telefone:
            </label>
            <input type="number" name="telephone" id="telephone" class="input">
        </div>

        <div class="wrapper">
            <label for="password">
                Senha:
            </label>
            <input type="password" name="password" id="password" class="input">
        </div>
        <input type="submit" value="Cadastrar" class="btn-register">
    </form>
</div>

<?php require "./pages/footer.php" ?>