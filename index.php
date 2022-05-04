<!-- Connexion à la BDD // Gestion des erreurs -->
<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("connexion_BDD.php");
$pdo=connexion_BDD();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <!-- Connexion page de style + Gestion des polices d'écriture + Icons -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />

    <title>Accueil - Gestion de salles</title>

  </head>

  <!-- Listing des différents boutons -->
  
  <body>
    <div class="center-zone">
        <?php 
          if (!isset($_SESSION['id_user'])) {
            ?>
            <button type="button" class="btn btn-primary btn-sm button-space"><a href="insert.php">Inscription</a></button>

            <button type="button" class="btn btn-primary btn-sm button-space"><a href="login.php">Connexion</a></button>
            <?php
          } else {
            ?>
            <button type="button" class="btn btn-primary btn-sm button-space"><a href="crud/read.php">Voir le planning</a></button>

            <?php echo "<button type=\"button\" class=\"btn btn-primary btn-sm button-space\"><a href=\"crud/add.php?id=$_SESSION[id_user]\">Réserver un créneau</a></button>"; ?>

            <?php echo "<button type=\"button\" class=\"btn btn-primary btn-sm button-space\"><a href=\"crud/viewUpdate.php?id=$_SESSION[id_user]\">Modifier un créneau</a></button>";?>

            <?php echo "<button type=\"button\" class=\"btn btn-primary btn-sm button-space\"><a href=\"crud/viewDelete.php?id=$_SESSION[id_user]\">Supprimer un créneau</a></button>";?>

            <button type="button" class="btn btn-primary btn-sm button-space" ><a href="disconnect.php">Déconnexion</a></button>
            <?php
          }
        ?>
    </div>
  </section>
  </body>
</html>