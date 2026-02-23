<?php 
// Connexion à la base de données
include 'connexion.php'; 

// Script PHP pour insérer les informations (Question 6.b)
if (isset($_POST['ajouter'])) {
    $nom = mysqli_real_escape_string($connexion, $_POST['nomMarche']);
    $description = mysqli_real_escape_string($connexion, $_POST['description']);
    $capacite = $_POST['capacite'];
    $adresse = mysqli_real_escape_string($connexion, $_POST['adresse']);
    $telephone = mysqli_real_escape_string($connexion, $_POST['telephone']);
    
    // Gestion de l'image (Question 1 & 6.a)
    $image = $_FILES['image']['name'];
    $destination = "image/" . basename($image);
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
        $sql = "INSERT INTO Marche (nomMarche, description, capacite, adresse, telephone, image) 
                VALUES ('$nom', '$description', '$capacite', '$adresse', '$telephone', '$image')";
        
        if (mysqli_query($connexion, $sql)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur : " . mysqli_error($connexion);
        }
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Marché</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">

<?php include 'menu.php'; ?>

<div class="container mt-5">
    <div class="card shadow mx-auto" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">
            <h3 class="text-center">Formulaire de création d'un nouveau marché</h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nom du marché</label>
                    <input type="text" name="nomMarche" class="form-control" placeholder="Entrez le nom" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Description du marché"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Capacité du marché</label>
                    <input type="number" name="capacite" class="form-control" placeholder="Nombre de places">
                </div>

                <div class="mb-3">
                    <label class="form-label">Adresse</label>
                    <input type="text" name="adresse" class="form-control" placeholder="Adresse complète">
                </div>

                <div class="mb-3">
                    <label class="form-label">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" placeholder="Numéro de téléphone">
                </div>

                <div class="mb-3">
                    <label class="form-label">Image du marché</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <button type="submit" name="ajouter" class="btn btn-primary w-100 shadow">Ajouter le marché</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>