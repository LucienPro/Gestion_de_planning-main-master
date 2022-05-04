<!-- <?php
// Connexion avec les sessions
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

//Connexion à la BDD
include("../connexion_BDD.php");
$pdo=connexion_BDD();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css"/>
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
    
    <title>Liste des utilisateurs - Gestion de tâches</title>

</head>
    <body>
        <section>
            <div class="container-view">
                <h3>Listing des utilisateurs de l'application</h3>

                    <?php
                    // Affichage des utilisateurs de l'application
                    $stmt = $pdo->prepare("SELECT * FROM utilisateur");
                    $stmt->execute();
                    while($row = $stmt->fetch())
                    {
                        echo $row['nom'] . "\n" . $row['prenom']."<br>";
                    }
                    ?>
            </div>
        </section>
    </body>
</html> -->