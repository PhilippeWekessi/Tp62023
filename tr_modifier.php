<?php
include 'connexion.php';

// Vérifier si le formulaire a été soumis
if (isset($_POST['modifier'])) {
    
    // Récupération et sécurisation des données envoyées par le formulaire
    $id = mysqli_real_escape_string($connexion, $_POST['idMarche']);
    $nom = mysqli_real_escape_string($connexion, $_POST['nomMarche']);
    $cap = mysqli_real_escape_string($connexion, $_POST['capacite']);
    $adr = mysqli_real_escape_string($connexion, $_POST['adresse']);
    $tel = mysqli_real_escape_string($connexion, $_POST['telephone']);

    // Gestion du changement d'image
    if (!empty($_FILES['image']['name'])) {
        // Si l'utilisateur a choisi une nouvelle image
        $img = $_FILES['image']['name'];
        $destination = "image/" . basename($img);
        
        // Déplacement du fichier vers le dossier image
        if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            // Mise à jour avec la nouvelle image
            $sql = "UPDATE Marche SET 
                    nomMarche='$nom', 
                    capacite='$cap', 
                    adresse='$adr', 
                    telephone='$tel', 
                    image='$img' 
                    WHERE idMarche=$id";
        } else {
            echo "Erreur lors du téléchargement de l'image.";
            exit();
        }
    } else {
        // Si aucune nouvelle image n'est choisie, on garde l'ancienne (on ne touche pas au champ 'image')
        $sql = "UPDATE Marche SET 
                nomMarche='$nom', 
                capacite='$cap', 
                adresse='$adr', 
                telephone='$tel' 
                WHERE idMarche=$id";
    }

    // Exécution de la requête
    if (mysqli_query($connexion, $sql)) {
        // Redirection vers l'accueil si succès
        header("Location: index.php");
        exit();
    } else {
        // Affichage de l'erreur SQL si échec
        echo "Erreur lors de la mise à jour : " . mysqli_error($connexion);
    }
} else {
    // Si on accède au fichier sans passer par le formulaire
    header("Location: index.php");
    exit();
}
?>