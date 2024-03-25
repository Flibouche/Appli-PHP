<?php
session_start(); // Démarre ou reprend une session existante

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":
            if (isset($_POST['submit'])) { // Vérifie si le formulaire a été soumis

                // Récupération et filtrage des données du formulaire
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING); // Récupère et filtre le nom du produit
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // Récupère et filtre le prix du produit
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); // Récupère et filtre la quantité du produit

                // Vérifie si toutes les données du formulaire sont valides
                if ($name && $price && $qtt) {

                    // Création d'un tableau associatif représentant le produit avec ses détails
                    $product = [
                        "name" => $name, // Nom du produit
                        "price" => $price, // Prix du produit
                        "qtt" => $qtt, // Quantité du produit
                    ];

                    // Ajout du produit à la variable de session 'products'
                    $_SESSION['products'][] = $product;
                    // Fait apparaître le message suivant selon le cas
                    $_SESSION['message'] = "<div class='alert alert-success'>Produit ajouté !</div>"; // En cas de succès
                } else {
                    $_SESSION['message'] = "<div class='alert alert-danger'>Erreur, merci d'ajouter un produit !</div>"; // En cas d'echec
                }

                // Redirection vers la page 'index.php' après le traitement du formulaire
                header("Location:index.php");
            };
            break;
        case "delete":
            unset($_SESSION['products'][$_GET['index']]); // Supprime un produit spécifique du panier en utilisant l'index passé dans l'URL
            header("Location:recap.php");
            break;

        case "clear":
            unset($_SESSION['products']); // Supprime tous les produits de la session en supprimant la variable de session 'products'
            header("Location:index.php");
            break;

        case "up-qtt":
            ($_SESSION['products'][$_GET['index']]['qtt']++); // Incrémente la quantité d'un produit spécifique dans le tableau $_SESSION['products'] en utilisant l'index passé en paramètre dans la requête GET
            header("Location:recap.php");
            break;

        case "down-qtt":
            ($_SESSION['products'][$_GET['index']]['qtt']--); // Décrémente la quantité d'un produit spécifique dans le tableau $_SESSION['products'] en utilisant l'index passé en paramètre dans la requête GET
            header("Location:recap.php");
            break;
    }
}
