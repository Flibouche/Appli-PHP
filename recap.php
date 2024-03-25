<?php
session_start();
ob_start();
$title = "Récapitulatif des produits";
$isDisabled1 = "";
$isDisabled2 = "disabled";
?>

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
        $total = $product['qtt'] * $product['price'];
        echo "<tr>",
        "<td>" . $index . "</td>",

        "<td>" . $product['name'] . "</td>",

        "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",

        "<td class='quantity'> <a class='fa-solid fa-minus text-decoration-none' href='traitement.php?action=down-qtt&index=" . $index . "'></a> " . $product['qtt'] . " <a class='fa-solid fa-plus text-decoration-none' href='traitement.php?action=up-qtt&index=" . $index . "'></a></td>",

        "<td>" . number_format($total, 2, ",", "&nbsp;") . "&nbsp;€</td>",

        "<td class='deleteBtn'>" . "<a class='fa-solid fa-xmark text-decoration-none' href='traitement.php?action=delete&index=" . $index . "'></a>" . "</td>",
        "</tr>";
        $totalGeneral += $total;
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

<?php
$content = ob_get_clean();

require_once "template.php";
?>