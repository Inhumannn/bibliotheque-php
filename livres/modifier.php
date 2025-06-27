<?php 
require_once('../config/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Document</title>
</head>
<body>
  <div class="table_component" role="region" tabindex="0">
    <table>
      <caption><a href="../public/index.php">Bibliothèque</a> - Modifier </caption>
      <thead>
        <tr>
            <th>Auteur</th>
            <th>Titre</th>
            <th>Genre</th>
            <th>Année Publication</th>
            <th>Ajouter le livre</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <form action="#" method="post">
            <select name="auteur" required>
              <option value="" hidden></option>
              <?php foreach($auteurs as $auteur): ?>
                <option value="<?= $auteur['id_auteur'] ?>>">
                  <?= $auteur['nom_auteur'] ?> <?= $auteur['prenom_auteur'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </td>
            <td><input type="text" name="titre" id="titre" required></td>
            <td>
            <select name="genre" required>
              <option value="" hidden></option>
              <?php foreach($genres as $genre): ?>
                <option value="<?= $genre['id_genre'] ?>">
                  <?= $genre['nom_genre'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </td>
            <td><input type="number" name="publication" id="publication" required></td>
            <td><input type="submit" name="register" value="Enregistrer"></form></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>