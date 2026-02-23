<?php
include 'connexion.php';

// 1. Récupération de la ville à modifier
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connexion, $_GET['id']);
    $resultat = mysqli_query($connexion, "SELECT * FROM Ville WHERE idVille = '$id'");
    $ville = mysqli_fetch_assoc($resultat);
}

// 2. Traitement de la mise à jour
if (isset($_POST['modifier'])) {
    $idVille = $_POST['idVille'];
    $nomVille = mysqli_real_escape_string($connexion, $_POST['nomVille']);

    $sql = "UPDATE Ville SET nomVille = '$nomVille' WHERE idVille = $idVille";

    if (mysqli_query($connexion, $sql)) {
        header("Location: liste_ville.php");
        exit();
    } else {
        echo "Erreur lors de la modification : " . mysqli_error($connexion);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la Ville</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include 'menu.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-warning">
                        <h4 class="mb-0">Modifier le nom de la ville</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="idVille" value="<?php echo $ville['idVille']; ?>">
                            
                            <div class="mb-3">
                                <label class="form-label">Nom de la ville</label>
                                <input type="text" name="nomVille" class="form-control" 
                                       value="<?php echo htmlspecialchars($ville['nomVille']); ?>" required>
                            </div>

                            <button type="submit" name="modifier" class="btn btn-warning w-100">Mettre à jour</button>
                            <a href="liste_ville.php" class="btn btn-secondary w-100 mt-2">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>