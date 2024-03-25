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
                        "total" => $price * $qtt // Calcul du prix total du produit (prix * quantité)
                    ];

                    // Ajout du produit à la variable de session 'products'
                    $_SESSION['products'][] = $product;
                }

                // Vérifie si la variable $product est évaluée à true, ce qui signifie que l'ajout du produit a réussi
                if ($product) {
                    $_SESSION['message'] = "Produit ajouté !"; // En cas de réussite
                } else {
                    $_SESSION['message'] = "erreur"; // En cas d'echec
                }
                // Redirection vers la page 'index.php' après le traitement du formulaire
                header("Location:index.php");
            };
            break;
        case "delete":;
            break;
        case "clear":
            unset($_SESSION['products']);
            header("Location:index.php");
            break;
        case "up-qtt":
            ($_SESSION['products'][$_GET['index']]['qtt']++);
            ($_SESSION['products'][$_GET['index']]['total']);
            header("Location:recap.php");
            break;
        case "down-qtt":;
            ($_SESSION['products'][$_GET['index']]['qtt']--);
            ($_SESSION['products'][$_GET['index']]['total']--);
            header("Location:recap.php");
            break;
    }
}
