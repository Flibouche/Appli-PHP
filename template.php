<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ========================== BOOTSTRAP =======================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- ========================== FONT AWESOME =======================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title><?= $title ?></title>
</head>

<body>
    <div id="wrapper">
        <div class="grid text-center p-5">
            <a class="btn btn-primary<?= $isDisabled1 ?>" href="index.php" role="button">Ajouter produit</a>
            <div class="position-relative d-inline-block">
                <a class="btn btn-primary<?= $isDisabled2 ?>" href="recap.php" role="button">Panier</a>
                <?php
                $nbProducts = 0;
                if (isset($_SESSION['products'])) {
                    $nbProducts = count($_SESSION['products']);
                }
                ?>
                <span class="position-absolute top-0 translate-middle px-2 bg-danger text-white rounded-circle"><?= $nbProducts ?></span>
            </div>
            <?= $content ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="js/alert.js"></script>
</body>

</html>