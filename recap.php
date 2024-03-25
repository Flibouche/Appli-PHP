<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ========================== BOOTSTRAP =======================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- ========================== FONT AWESOME =======================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Récapitulatif des produits</title>
</head>

<body>
    <div class="grid text-center p-5">
        <a class="btn btn-primary" href="index.php" role="button">Ajouter produit</a>
        <div class="position-relative d-inline-block">
            <a class="btn btn-secondary disabled" href="recap.php" role="button">Panier</a>
            <?php
            $nbProducts = 0;
            if (isset($_SESSION['products'])) {
                $nbProducts = count($_SESSION['products']);
            }
            ?>
            <span class="position-absolute top-0 translate-middle px-2 bg-danger text-white rounded-circle"><?= $nbProducts ?></span>
        </div>
        <h1 class="text-primary">Récapitulatif de votre panier</h1>
        <?php
        if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            echo "<p>Aucun produit en session...</p>";
        } else {
            echo "<table class='table table-striped'>",
            "<thead>",
            "<tr>",
            "<th>#</th>",
            "<th>Nom</th>",
            "<th>Prix</th>",
            "<th>Quantité</th>",
            "<th>Total</th>",
            "<th><i class='fa-solid fa-trash'></i></th>",
            "</tr>",
            "</thead>",
            "<tbody>";

            $totalGeneral = 0;
            foreach ($_SESSION['products'] as $index => $product) {
                echo "<tr>",
                "<td>" . $index . "</td>",

                "<td>" . $product['name'] . "</td>",

                "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",

                "<td class='quantity'> <a class='fa-solid fa-minus' href='traitement.php?action=down-qtt&index=" . $index . "'></a> " . $product['qtt'] . " <a class='fa-solid fa-plus' href='traitement.php?action=up-qtt&index=" . $index . "'></a></td>",

                "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",

                "<td class='deleteBtn'>" . "<i class='fa-solid fa-xmark'?action=clear></i>" . "</td>",
                "</tr>";
                $totalGeneral += $product['total'];
            }
            echo "<tr>",
            "<td colspan=4>Total général : </td>",
            "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong</td>",
            "<td><a class='btn btn-danger' href='traitement.php?action=clear' role='button' method='post'>Tout supprimer</a></td>",
            "</tr>",
            "</tbody>",
            "</table>";
        }
        ?>
    </div>
</body>

</html>