<!-- Connexion à la BDD // Gestion des erreurs -->
<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("../connexion_BDD.php");
$pdo=connexion_BDD();
?>

<?php

if (!empty($_GET['id'])) {
    $idres = $_GET['id'];
}

$id = $_SESSION['id_user'];


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
<div class="center-zone">
<form class="form-listing" name="form1" method="post" action="delete.php"> 
    <h2>Êtes-vous sur de vouloir supprimer cette réservation ?</h2>
    <p><input type="hidden" value="<?php echo $idres?>" name="test"></p>
    <button class="btn btn-primary btn-sm button-space" name="submit" type="submit">SUPPRIMER</button>
</form>
<a class="txt-back-connect" href="../index.php">Retour</a>

</div>
</body>






<?php
if(isset($_POST['submit']))
{
    $idres = $_POST['test'];
    $stmt = $pdo->prepare("DELETE FROM reservation WHERE reservation.id_reservation='$idres'");
    $stmt ->execute();

?>

<script type="text/javascript">
alert("Réservation supprimée avec succés");
window.location.href = "../index.php";
</script>

<?php
}
?>





