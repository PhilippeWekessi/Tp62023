<?php
// 1. Connexion et récupération des données (indispensable en haut du fichier)
include 'connexion.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connexion, $_GET['id']);
    $query = "SELECT * FROM Marche WHERE idMarche = '$id'";
    $resultat = mysqli_query($connexion, $query);
    
    // On crée la variable $marche ici
    $marche = mysqli_fetch_assoc($resultat);

    // Si l'ID ne correspond à rien dans la base
    if (!$marche) {
        echo "Marché non trouvé.";
        exit();
    }
} else {
    echo "ID du marché manquant.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Marché</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include 'menu.php'; ?>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h3>Modifier les informations du marché</h3>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="tr_modifier.php">
                    
                    <input type="hidden" name="idMarche" value="<?php echo $marche['idMarche']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Nom du Marché</label>
                        <input type="text" name="nomMarche" class="form-control" value="<?php echo $marche['nomMarche']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Capacité (places)</label>
                        <input type="number" name="capacite" class="form-control" value="<?php echo $marche['capacite']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Adresse</label>
                        <input type="text" name="adresse" class="form-control" value="<?php echo $marche['adresse']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="text" name="telephone" class="form-control" value="<?php echo $marche['telephone']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Image actuelle : <?php echo $marche['image']; ?></label>
                        
                        <div class="mb-2">
                            <img src="image/<?php echo $marche['image']; ?>" alt="Ancienne image" style="width: 150px; height: auto; border-radius: 5px; border: 1px solid #ddd;">
                        </div>

                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Laissez vide pour conserver l'image actuelle.</small>
                    </div>

                    <button type="submit" name="modifier" class="btn btn-success w-100">Enregistrer les modifications</button>
                    <a href="index.php" class="btn btn-secondary w-100 mt-2">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>