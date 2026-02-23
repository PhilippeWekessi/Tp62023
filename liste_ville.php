<?php 
// Connexion à la base de données
include 'connexion.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Villes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php 
// Inclusion du menu de navigation
include 'menu.php'; 
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Villes enregistrées</h2>
        <a href="ajouter_ville.php" class="btn btn-success">Ajouter une ville</a>
    </div>

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Répertoire des localités</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom de la Ville</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Requête SQL pour récupérer les villes
                    $sql = "SELECT * FROM Ville ORDER BY nomVille ASC";
                    $res = mysqli_query($connexion, $sql);

                    if (mysqli_num_rows($res) > 0) {
                        while($v = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td><?php echo $v['idVille']; ?></td>
                            <td><strong><?php echo htmlspecialchars($v['nomVille']); ?></strong></td>
                            <td class="text-center">
                                <a href="modifier_ville.php?id=<?php echo $v['idVille']; ?>" class="btn btn-sm btn-outline-primary">Éditer</a>
                                <a href="supprimer_ville.php?id=<?php echo $v['idVille']; ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Supprimer cette ville ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center p-4'>Aucune ville dans la base de données.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>