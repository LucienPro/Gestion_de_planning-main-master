<!-- Connexion à la BDD // Gestion des erreurs -->
<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("connexion_BDD.php");
$pdo=connexion_BDD();


$nomError = $prenomError = $mailError = $mdpError = $nom = $prenom = $mail = $mdp= "";

if (!empty($_POST)) {

    $nom = checkInput($_POST['nom']);
    $prenom = checkInput($_POST['prenom']);
    $mail = checkInput($_POST['mail']);
    $mdp = checkInput($_POST['mdp']);


    if (empty($nom)) {
        $nomError = 'Ce champ ne peut pas être vide';
    }

    if (empty($prenom)) {
        $prenomError = 'Ce champ ne peut pas être vide';
    }

    if (empty($mail)) {
        $mailError = 'Ce champ ne peut pas être vide';
    }

    if (empty($mdp)) {
        $mdpError = 'Ce champ ne peut pas être vide';
    }



    $pdo=connexion_bdd();
    // Execution de la requete
    $stmt = $pdo->prepare("INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES (?,?,?,?)");
    $stmt->execute(array($nom, $prenom, $mail, $mdp));
    header('Location: index.php');
}

//Gestion des erreurs

function checkInput($data)
{
    $data = trim($data); //Suppression des espaces en début et fin de chaîne
    $data = stripslashes($data); //Suppresion des antislashs d'une chaîne
    $data = htmlspecialchars($data); //Convertit les caractères spéciaux en entités HTML
    return $data;
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
    <script src="https://kit.fontawesome.com/99ba6b2d47.js" crossorigin="anonymous"></script>
    <title>Inscription</title>
</head>
<body>
    <section>

        <div class="center-zone">
        <h3>FORMULAIRE D'INSCRIPTION</h3>
            <form action="insert.php" role ="form" method="post" enctype="multipart/form-data" >
                <div class="center-input">
                    <label for="nom">Nom*</label><br>
                    <input class="input-space" type="text" placeholder="" id="nom" name="nom" value="<?php echo $nom; ?>" required>
                    <span><?php echo $nomError ?></span>
                </div>
                <div class="center-input">
                    <label for="prenom">Prénom*</label><br>
                    <input class="input-space" type="text" placeholder="" id="prenom" name="prenom" value="<?php echo $prenom; ?>" required>
                    <span><?php echo $prenomError ?></span>
                </div>
                <div class="center-input">
                    <label for="mail">Mail*</label><br>
                    <input class="input-space" type="email" placeholder="" id="mail" name="mail" value="<?php echo $mail; ?>" required>
                    <span><?php echo $mailError ?></span>
                </div>
                <div class="center-input">
                    <label for="mdp">Mot de passe*</label><br>
                    <input class="input-space" type="password" placeholder="" id="mdp" name="mdp" value="<?php echo $mdp; ?>" required>
                    <span><?php echo $mdpError ?></span>
                </div>
                <div class="button-inscription">
                    <button class="btn btn-primary btn-sm button-space" type="submit">Valider <i class="fas fa-check-circle"></i></button>
                </div> 
            </form>
            <div>
                <a class="txt-back-connect" href="index.php">Retour</a>
            </div>
        </div>
    </section>
</body>
</html>