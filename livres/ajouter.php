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

// if(!empty($_POST['register'])){
//   $auteur = $_POST['auteur'];
//   $titre = $_POST['titre'];
//   $genre = $_POST['genre'];
//   $publication = $_POST['publication'];

//   if(empty($auteur) || empty($titre) || empty($genre) || empty($publication)){
//     exit("Tous les champs doivent être renseignés");
//   };

//   // $stmt = $pdo->("");
//   $stmt->execute(array(
//       'auteur' => $auteur,
//       'titre' => $titre,
//       'genre' => $genre,
//       'publication' => $publication
//    ));

//    if($stmt->rowCount() > 0){
//       echo "Nouveau membre ajouté avec succès";
//    } else {
//       echo "Aucune ligne insérée";
//    }
// }

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
      <caption>Bibliothèque</caption>
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
            <select name="auteur" required>
              <option value="" hidden></option>
              <?php foreach($auteurs as $auteur): ?>
                <option value="<?= $auteur['nom_auteur'] ?> <?= $auteur['prenom_auteur'] ?>">
                  <?= $auteur['nom_auteur'] ?> <?= $auteur['prenom_auteur'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </td>
            <td><input type="text" name="titre" id="titre"></td>
            <td>
            <select name="auteur" required>
              <option value="" hidden></option>
              <?php foreach($genres as $genre): ?>
                <option value="<?= $genre['nom_genre'] ?>">
                  <?= $genre['nom_genre'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </td>
            <td><input type="text" name="publication" id="publication"></td>
            <td><input type="submit" name="register" value="Enregistrer"></form></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
