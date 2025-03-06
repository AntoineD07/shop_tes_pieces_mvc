<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>descrription</title>

    <link rel="stylesheet" href="./assets/css/description.css">
</head>

<body>




<main>
    <h2>Détails du produit</h2>


    <?php if ($piece): ?>
        <div class="piece-detail">
            <div class="contnaire-g">
                <div class="text">
                    <h3><?php echo htmlspecialchars($piece['nom_piece']); ?></h3>
                    <p>Prix : <?php echo htmlspecialchars($piece['prix']); ?> €</p>
                    <p>Modèle : <?php echo htmlspecialchars($piece['cars_name']); ?></p>
                </div>
            
                <img src="<?php echo htmlspecialchars($piece['img_piece']); ?>" 
                alt="<?php echo htmlspecialchars($piece['nom_piece']); ?>">
            </div>

            <div class="contnaire_d">
                <h3 class="titre">Caractéristiques :</h3>
                <p><?php echo htmlspecialchars($piece['caracteristique']); ?></p>
                <h3 class="titre">Description :</h3>
                <p><?php echo htmlspecialchars($piece['descriptif']); ?></p>

                <div class="contnaire-btn">
                    <a href="/panier?action=add&piece_id=<?php echo urlencode($piece['id_piece']); ?>">
                        <button>Ajouter au panier</button>
                    </a>

                </div>

            </div>
        </div>
    <?php else: ?>
        <p>Aucune information disponible.</p>
    <?php endif; ?>
</main>


</body>
<script src="./assets/js/script.js"></script>

</html>