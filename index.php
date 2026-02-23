<?php 
// Connexion à la base de données
include 'connexion.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Marchés</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">

<?php include 'menu.php'; ?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Liste des marchés du Bénin</h2>
    
    <div class="row">
        <?php
        // Requête pour récupérer tous les marchés
        $sql = "SELECT * FROM Marche";
        $resultat = mysqli_query($connexion, $sql);

        // Vérification si la table contient des enregistrements
        if ($resultat && mysqli_num_rows($resultat) > 0) {
            
            while($marche = mysqli_fetch_assoc($resultat)) {
                // Chemin vers le dossier "image"
                $cheminImage = "image/" . basename($marche['image']); 
        ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?php echo $cheminImage; ?>" class="card-img-top" alt="Marché" style="height:200px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?php echo $marche['nomMarche']; ?></h5>
                        <p class="card-text text-muted">
                            Capacité : <?php echo $marche['capacite']; ?> places
                        </p>
                        
                        <div class="d-flex justify-content-between mt-3">
                            <a href="modifier.php?id=<?php echo $marche['idMarche']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="delete.php?id=<?php echo $marche['idMarche']; ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Voulez-vous vraiment supprimer ce marché ?')">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
            }
        } else {
            // Message à afficher si la table est vide
            echo '<div class="col-12 text-center mt-5">
                    <div class="alert alert-info py-4 shadow-sm">
                        <h4>Aucun marché disponible</h4>
                    </div>
                  </div>';
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>