<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ========================== BOOTSTRAP =======================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Ajout produit</title>
</head>

<body>
    <div class="grid text-center p-5">
            <a class="btn btn-secondary disabled" href="index.php" role="button">Ajouter produit</a>
            <div class="position-relative d-inline-block">
                <a class="btn btn-primary" href="recap.php" role="button">Panier</a>
                <span class="position-absolute top-0 translate-middle px-2 bg-danger text-white rounded-circle"><?= count($_SESSION['products']) ?></span>
            </div>
        <h1 class="text-primary">Ajouter un produit</h1>
        <form action="traitement.php" method="post">
            <p>
                <label class="text-start">
                    Nom du produit :
                    <input class="form-control" type="text" name="name">
                </label>
            </p>
            <p>
                <label class="text-start">
                    Prix du produit :
                    <input class="form-control" type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label class="text-start">
                    Quantité désirée :
                    <input class="form-control" type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
            <div id="liveAlertPlaceholder"></div>
            <input class="btn btn-primary" id="liveAlertBtn" type="submit" name="submit" value="Ajouter le produit">
            </p>

        </form>
    </div>
    <script src="js/alert.js"></script>
</body>

</html>