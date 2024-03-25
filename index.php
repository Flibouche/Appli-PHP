<?php
session_start();
ob_start();
$title = "Ajout produit";
$isDisabled1 = "disabled";
$isDisabled2 = "";
?>

<h1 class="text-primary">Ajouter un produit</h1>
<form action="traitement.php?action=add" method="post">
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
        <input class="btn btn-primary" type="submit" name="submit" value="Ajouter le produit">
    </p>

</form>

<?php
// Vérifie si une variable de session nommée 'message' est définie
if (isset($_SESSION['message'])) {
    echo $_SESSION['message']; // Affiche le contenu de la variable de session 'message'
    unset($_SESSION['message']); // Supprime la variable de session 'message' afin qu'elle ne soit pas réaffichée après le chargement ou l'actualisation de la page
}

$content = ob_get_clean();

require_once "template.php";
?>