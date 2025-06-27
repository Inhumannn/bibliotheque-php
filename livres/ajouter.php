<?php
require_once('../config/db.php');

$stmtAuteurs = $pdo->prepare("SELECT id_auteur, nom_auteur, prenom_auteur FROM auteurs");
$stmtAuteurs->execute();
$auteurs = $stmtAuteurs->fetchAll(PDO::FETCH_ASSOC);
// var_dump($auteurs);

$stmtGenres = $pdo->prepare("SELECT id_genre, nom_genre FROM genres");
$stmtGenres->execute();
$genres = $stmtGenres->fetchAll(PDO::FETCH_ASSOC);
// var_dump($genres);

if(!empty($_POST['register'])){
  $auteur = $_POST['auteur'];
  $titre = $_POST['titre'];
  $genre = $_POST['genre'];
  $publication = $_POST['publication'];

  if(empty($auteur) || empty($titre) || empty($genre) || empty($publication)){
    exit("Attention : Tous les champs doivent être renseignés.");
  };

  $stmt = $pdo->prepare("INSERT INTO livres (fk_id_auteur, titre, fk_id_genre, annee_publication) VALUES (:auteur, :titre, :genre, :publication)");
  $stmt->execute(array(
      'auteur' => $auteur,
      'titre' => $titre,
      'genre' => $genre,
      'publication' => $publication
   ));

   if($stmt->rowCount() > 0){
    $lastId = $pdo->lastInsertId();
    if($lastId){
      $addOK = "Nouveau membre ajouté avec succès.ID inséré : $lastId";
      echo "<p style='color: green;'>$addOK</p>";
      echo '<meta http-equiv="refresh" content="3;url=../public/index.php">';
      exit();
      // header('Location: ../public/index.php');
    }
   } else {
      echo "Aucune ligne insérée";
   }

}

?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Document</title>
</head>
<body>
  <div class="table_component" role="region" tabindex="0">
    <table>
      <caption><a href="../public/index.php">Bibliothèque</a> - Ajouter </caption>
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
