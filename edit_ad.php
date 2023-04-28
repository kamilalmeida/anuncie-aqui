<?php
require "./pages/header.php";
require "./class/CategoryDaoMysql.php";
require "./class/AdvertisementDaoMysql.php";
?>


<?php
$advertisementDao = new AdvertisementDaoMysql($pdo);

if (empty($_SESSION['cLogin'])) {
?>
    <script type="text/javascript">
        window.location.href = "./login.php"
    </script>
<?php
    exit;
}

if (isset($_POST['title']) && !empty($_POST['title'])) {

    $title = filter_input(INPUT_POST, 'title');
    $category = filter_input(INPUT_POST, 'category');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
    $description = filter_input(INPUT_POST, 'description');
    $state = filter_input(INPUT_POST, 'state');
    $modelYear = filter_input(INPUT_POST, 'model_year');
    $mileage = filter_input(INPUT_POST, 'mileage');
    $photos = $_FILES['photos'];


    if (isset($_FILES['photos'])) {
        $photos = $_FILES['photos'];
    } else {
        $photos = [];
    }

    $advertisement = new MyAdvertisement();
    $advertisement->setTitle($title);
    $advertisement->setIdCategory($category);
    $advertisement->setPrice($price);
    $advertisement->setDescription($description);
    $advertisement->setState($state);
    $advertisement->setModelYear($modelYear);
    $advertisement->setMileage($mileage);
    $advertisement->setId($_GET['id']);
    $advertisement->setPhotos($photos);


    $advertisementDao->editAdvertisement($advertisement);
?>
    <div class="product-add">Produto editado com sucesso!</div>

<?php
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $infoInputs = $advertisementDao->getAdvertisementId($_GET['id']);
} else {
}
?>


<div class="advertisement">
    <h1>Meus anúncios - Editar anúncio</h1>

    <div class="anime-left form">
        <form method="POST" enctype="multipart/form-data">

            <div class="wrapper">
                <label for="category" class="label">
                    Categoria:
                </label>
                <select name="category" id="category" class="input">
                    <option value="0" <?php echo ($infoInputs['state'] == '0') ? 'selected=selected' : '' ?>>Selecione</option>
                    <?php
                    $category = new CategoryDaoMysql($pdo);
                    $Allcategory = $category->getListCategory();
                    foreach ($Allcategory as $category) :
                    ?>
                        <option value="<?php echo $category['id'] ?>" <?php echo ($infoInputs['id_category'] == $category['id']) ? 'selected=selected' : '' ?>>
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="wrapper">
                <label for="title" class="label">
                    Título:
                </label>
                <input type="text" name="title" id="title" class="input" value="<?php echo $infoInputs['title']; ?>">
            </div>

            <div class="wrapper">
                <label for="description" class="label">
                    Descrição do produto:
                </label>
                <textarea name="description" id="" cols="30" rows="10" class="input"><?php echo $infoInputs['description']; ?></textarea>
            </div>

            <div class="wrapper">
                <label for="model_year" class="label">
                    Ano do modelo:
                </label>
                <input type="number" name="model_year" id="model_year" class="input" value="<?php echo $infoInputs['model_year']; ?>">
            </div>

            <div class="wrapper">
                <label for="mileage" class="label">
                    Quilometragem:
                </label>
                <input type="number" name="mileage" id="mileage" class="input" value="<?php echo $infoInputs['mileage']; ?>">
            </div>

            <div class="wrapper">
                <label for="price" class="label">
                    Preço (R$):
                </label>
                <input type="text" name="price" id="price" class="input" value="<?php echo $infoInputs['price']; ?>">
            </div>

            <div class="wrapper">
                <label for="category" class="label">
                    Estado financeiro:
                </label>
                <select name="state" id="state" class="input">
                    <option value="0" <?php echo ($infoInputs['state'] == '0') ? 'selected=selected' : '' ?>>Selecione</option>
                    <option value="1" <?php echo ($infoInputs['state'] == '1') ? 'selected=selected' : '' ?>>Financiado</option>
                    <option value="2" <?php echo ($infoInputs['state'] == '2') ? 'selected=selected' : '' ?>>Com multas</option>
                    <option value="3" <?php echo ($infoInputs['state'] == '3') ? 'selected=selected' : '' ?>>IPVA Pago</option>
                    <option value="4" <?php echo ($infoInputs['state'] == '4') ? 'selected=selected' : '' ?>>De leilão</option>
                </select>
            </div>

            <div class="wrapper">
                <label for="add_photo" class="label">
                    Fotos
                </label>
                <input type="file" name="photos[]" multiple>
            </div>

            <input type="submit" value="Salvar" class="btn-send-advertisement" name="save">
        </form>
    </div>
</div>