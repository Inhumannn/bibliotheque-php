<?php
require_once('../config/db.php');
$stmt = $pdo->prepare("SELECT 
            livres.id_livre,
            livres.titre,
            livres.annee_publication,
            auteurs.nom_auteur,
            auteurs.prenom_auteur,
            genres.nom_genre
        FROM livres
        JOIN auteurs ON livres.fk_id_auteur = auteurs.id_auteur
        JOIN genres ON livres.fk_id_genre = genres.id_genre");
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC); // n'affiche plus les clés numériques
// var_dump($books);
?>