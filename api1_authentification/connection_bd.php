<?php
    // Paramètres de connexion à la base de données
    $host = "54.36.191.193:3306"; // Hôte de la base de données
    $username = "u10_IlGgRNi0aG"; // Nom d'utilisateur de la base de données
    $password = "@3pS1+v8OSE^ntDFjHpK+A^N"; // Mot de passe de la base de données
    $database = "s10_authentification"; // Nom de la base de données

    try {
        // Connexion à la base de données avec PDO
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
        // Définir le mode d'erreur PDO à exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // En cas d'erreur, affichez un message et arrêtez le script
        die("La connexion à la base de données a échoué : " . $e->getMessage());
    }
?>
