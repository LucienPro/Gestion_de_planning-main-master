<!-- Connexion à la BDD // Gestion des erreurs -->
<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("../connexion_BDD.php");
$pdo=connexion_BDD();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Connexion page de style + Gestion des polices d'écriture + Icons -->

        <link rel="stylesheet" href="../css/style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Gestion du planning</title>
    </head>
    <body>

    <!-- Formulaire d'ajout d'une réservation -->
    <div class="center-zone">
        <form class="form-listing" name="form1" method="post" action="add.php">

        <!-- DEBUT // Selection de la salle -->

            <h3><label for="listsalle">Selectionner une salle</label></h3>
                <select name="listsalle">
                    <?php
                    $reponse = $pdo->prepare("SELECT * FROM salle");
                    $reponse->execute();
                    while ($donnees = $reponse->fetch()) {

                    echo "<option value=".$donnees['id_salle'].">".$donnees['libelle_salle']."</option>";

                    }
                    ?>     
                    <?php
                    if (isset($_POST['listsalle'])){
                        echo $_POST['listsalle'];
                    }
                    
                ?> 
                <br>   
                </select>

        <!-- FIN // Selection de la salle -->
                
                
        <!-- DEBUT // Selection heure -->
                

                <h3><label for="listheure">Selectionner une heure</label></h3>
                <select name="listheure">
                    <?php
                    $reponse = $pdo->prepare("SELECT * FROM heure");
                    $reponse->execute();
                    while ($donnees = $reponse->fetch()) {

                    echo "<option value=".$donnees['id_heure'].">".$donnees['libelle_heure']."</option>";

                    }
                    ?>     
                    <?php
                    if (isset($_POST['listheure'])){
                        echo $_POST['listheure'];
                    }
                    
                ?> 
                <br>   
                </select>


        <!-- FIN // Selection heure -->

        <!-- DEBUT // Selection Date -->


                <h3><label for="listdate">Selectionner une date</label></h3>
                <input type="date" name="dateres">

        <!-- FIN // Selection Date -->

        <!-- Validation du formulaire -->
        <button class="btn btn-primary btn-sm button-space" type="submit">Réserver</button>

            </form>

        <!-- Fin du formulaire -->
            
        <a class="txt-back-connect" href="../index.php">Retour</a>

        <?php

        $id = $_SESSION['id_user'];

        if(isset($_POST['submit']))
        {
            
            $listsalle = $_POST['listsalle'];
            $listheure = $_POST['listheure'];
            $listdate = $_POST['dateres'];

            
            $stmt = $pdo->prepare("SELECT * FROM reservation WHERE id_Salle='$listsalle' AND id_Heure='$listheure' AND DateReservation='$listdate'");
            $stmt ->execute();
            $row=$stmt->rowCount();

            if($row > 0) {
                echo "Le rendez-vous est déjà pris pour ce créneau";
                }
            
            if($row == 0){
                $stmt = $pdo->prepare("INSERT INTO reservation (id_reservation, id_Salle, id_Heure, DateReservation, id_Statut, id_User) VALUES (NULL, '$listsalle', '$listheure', '$listdate', '2','$id')");
                $stmt ->execute();
                echo "Ca fonctionne";
                ?>
                <script type="text/javascript">
                alert("Réservation ajoutée avec succés");
                window.location.href = "../index.php";
                </script>
                <?php
            }
        }

        ?>
    </div>

    </body>
</html>





