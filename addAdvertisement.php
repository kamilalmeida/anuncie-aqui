<?php
require "./pages/header.php"; ?>


<?php if (empty($_SESSION['cLogin'])) {
?>
    <script type="text/javascript">
        window.location.href = "./login.php"
    </script>
<?php
    exit;
}
?>
<div class="advertisement">
    <h1>Meus anúncios - Adicionar anúncio</h1>

    <div class="anime-left form">
        <form action="addAdvertisement_action.php" method="POST" enctype="multipart/form-data">

            <div class="wrapper">
                <label for="category" class="label">
                    Categoria:
                </label>
                <select name="category" id="category" class="input">
                    <option value="0">Selecione</option>
                    <?php require "./class/CategoryDaoMysql.php";
                    $category = new CategoryDaoMysql($pdo);
                    $Allcategory = $category->getListCategory();
                    foreach ($Allcategory as $category) :
                    ?>
                        <option value="<?php echo $category['id'] ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="wrapper">
                <label for="title" class="label">
                    Título:
                </label>
                <input type="text" name="title" id="title" class="input">
            </div>

            <div class="wrapper">
                <label for="description" class="label">
                    Descrição do produto:
                </label>
                <textarea name="description" id="" cols="30" rows="10" class="input"></textarea>
            </div>

            <div class="wrapper">
                <label for="model_year" class="label">
                    Ano do modelo:
                </label>
                <input type="number" name="model_year" id="model_year" class="input">
            </div>

            <div class="wrapper">
                <label for="mileage" class="label">
                    Quilometragem:
                </label>
                <input type="number" name="mileage" id="mileage" class="input">
            </div>

            <div class="wrapper">
                <label for="price" class="label">
                    Preço (R$):
                </label>
                <input type="text" name="price" id="price" class="input">
            </div>

            <div class="wrapper">
                <label for="category" class="label">
                    Estado financeiro:
                </label>
                <select name="state" id="state" class="input">
                    <option value="0">Selecione</option>
                    <option value="1">Financiado</option>
                    <option value="2">Com multas</option>
                    <option value="3">IPVA Pago</option>
                    <option value="4">De leilão</option>
                </select>
            </div>

            <div class="wrapper">
                <label for="add_photo" class="label">
                    Fotos
                </label>
                <input type="file" name="photos" multiple>
            </div>

            <input type="submit" value="Adicionar" class="btn-send-advertisement">
        </form>
    </div>
</div>