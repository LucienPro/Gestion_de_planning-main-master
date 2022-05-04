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
    
    <title>Listing de recherche - Gestion de tâches</title>
</head>

<body>
    <section>
        <div class="container-listing">
            <form class="form-listing" action="Zlisting.php" method="post">
                <input class="space" name="search-text" type="text">
                <button type="submit">Rechercher</button>   
            </form>

            <?php

            if(!empty($_POST['search-text'])){
                $text = $_POST['search-text'];
            
            $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE prenom = '$text'");
            $stmt->execute();
            while($row = $stmt->fetch())
                            {
                                echo $row['nom'] . "\n" . $row['prenom']."<br>";
                            }
            }                
                            ?>
            
        </div>

        <div class="container-listing">
            <form class="form-listing" action="Zlisting.php" method="post">
                <select name="search-date">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <button type="submit">Rechercher</button>   
            </form>

        <?php
            echo $_POST['search-date'];
            if(!empty($_POST['search-date'])){
                $date = $_POST['search-date'];
            
            $stmt = $pdo->prepare("SELECT COUNT(*) AS A FROM reservation WHERE month(DateReservation) = $date");}
            $stmt->execute();
            while($row = $stmt->fetch())
            {
                echo $row['A'];
            }
            
        ?>
                            
            


            
        </div>
    </section>

</body>
</html> -->