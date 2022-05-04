<!-- Connexion à la BDD // Gestion des erreurs -->
<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("connexion_BDD.php");
$pdo=connexion_BDD();
?>

<?php
if($_POST) {
$mail = htmlentities(strtolower(trim($_POST['mail'])));
$mdp = trim($_POST['mdp']);
};


//Mise en place des différentes variables de session
if (!empty($_POST)){
    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE mail = '$mail' AND mdp = '$mdp'");
    $stmt->execute();
    $row = $stmt ->fetch();
        if ($row) {
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['mail'] = $row['mail'];
                    header('Location:  index.php');        
        } else { ?>
          <script type="text/javascript">
        alert("Veuillez saisir un identifiant et un mot de passe correct");
        window.location.href = "login.php";
        </script>
        <?php
        };
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;900&display=swap"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script
      src="https://kit.fontawesome.com/99ba6b2d47.js"
      crossorigin="anonymous"
    ></script>
        <title>Connexion</title>
    </head>
    <body>
        <section>

          <div class="center-zone">
          <h3>CONNEXION</h3>
            <form action="login.php" method="post" class="form-inscription">
                <div class="center-input">
                    <label for="mail">Mail</label><br>
                    <input class="input-space" type="email" placeholder="" name="mail">
                </div>
                <div class="center-input">
                    <label for="mdp">Mot de passe</label><br>
                    <input class="input-space" type="password" placeholder="" name="mdp">
                </div>
                <div>
                    <button class="btn btn-primary btn-sm button-space" type="submit">Se connecter</button>    
                </div>
            </form>
            <a class="txt-back-connect" href="index.php">Retour</a>
          </div>
    </section>
    </body>
</html>