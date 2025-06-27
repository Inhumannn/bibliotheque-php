<?php require_once('../livres/liste.php') ?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Bibliothèque - Php</title>
</head>
<body>
  <div class="table_component" role="region" tabindex="0">
    <table>
      <caption>Bibliothèque</caption>
      <thead>
        <tr>
            <th>Auteur</th>
            <th>Titre</th>
            <th>Genre</th>
            <th>Année Publication</th>
            <th>Commande</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($books as $book): ?>
        <tr>
            <td><?=$book['nom_auteur'] ?> <?=$book['prenom_auteur'] ?></td>
            <td><?=$book['titre'] ?></td>
            <td><?=$book['nom_genre'] ?></td>
            <td><?=$book['annee_publication'] ?></td>
            <td><a href="../livres/ajouter.php">Ajouter</a> | <a href="../livres/modifier.php">Modifier</a> | <a href="../livres/supprimer.php">Supprimer</a> </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>