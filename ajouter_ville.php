<?php 
// Connexion à la base de données marchesBenin [cite: 25, 30]
include 'connexion.php'; 

// Traitement de l'insertion
if (isset($_POST['ajouter'])) {
    // Récupération et sécurisation du nom de la ville [cite: 12]
    $nomVille = mysqli_real_escape_string($connexion, $_POST['nomVille']);
    
    if (!empty($nomVille)) {
        $sql = "INSERT INTO Ville (nomVille) VALUES ('$nomVille')";
        
        if (mysqli_query($connexion, $sql)) {
            echo "<script>alert('Ville ajoutée avec succès !'); window.location.href='ajouter_ville.php';</script>";
        } else {
            echo "Erreur : " . mysqli_error($connexion);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Ville</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">

<?php include 'menu.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Ajouter une nouvelle ville</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nom de la ville</label>
                            <input type="text" name="nomVille" class="form-control" placeholder="Ex: Parakou" required>
                        </div>
                        <button type="submit" name="ajouter" class="btn btn-success w-100">Enregistrer la ville</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>