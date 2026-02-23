<?php
include 'connexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Marche WHERE idMarche = $id";
    
    if (mysqli_query($connexion, $sql)) {
        header("Location: index.php"); // Redirection après suppression
    } else {
        echo "Erreur lors de la suppression : " . mysqli_error($connexion);
    }
}
?>