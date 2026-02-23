<?php
include 'connexion.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connexion, $_GET['id']);

    // Attention : Si des marchés sont liés à cette ville, la suppression peut échouer 
    // à cause des contraintes de clé étrangère (Foreign Key).
    $sql = "DELETE FROM Ville WHERE idVille = $id";

    if (mysqli_query($connexion, $sql)) {
        header("Location: liste_ville.php");
        exit();
    } else {
        echo "<script>
                alert('Impossible de supprimer cette ville car elle est liée à un ou plusieurs marchés.');
                window.location.href='liste_ville.php';
              </script>";
    }
} else {
    header("Location: liste_ville.php");
}
?>