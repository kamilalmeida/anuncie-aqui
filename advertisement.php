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
    <h1>Meus anúncios</h1>

    <a href="./addAdvertisement.php" class="btn-add-advertisement"> + Adicionar anúncio</a>

    <table class="table" width="50%">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Título</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php
        require "./class/AdvertisementDaoMysql.php";
        $advertisement = new AdvertisementDaoMysql($pdo);
        $Alladvertisement = $advertisement->getAdvertisement();

        foreach ($Alladvertisement as $advertisement) :
        ?>
            <tr>
                <td align="center">
                    <?php if (!empty($advertisement['url'])) : ?>
                        <img src="./assets/img/advertisement/<?php echo $advertisement['url']; ?>" height="100" border="0" alt="">
                    <?php else : ?>
                        <img src="./assets/img/advertisement/camera.png" height="50 " border="0" alt="">
                    <?php endif; ?>
                </td>
                <td align="center"><?php echo $advertisement['title']; ?></td>
                <td align="center"> R$<?php echo number_format($advertisement['price'], 2); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>





















<?php
require "./pages/footer.php"; ?>