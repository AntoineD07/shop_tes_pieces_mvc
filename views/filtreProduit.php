<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filtre produit</title>

    <link rel="stylesheet" href="/assets/css/filtreProduit.css">
</head>
    
<body>


    <main> 
    <div>
        <h3>Vos pièces</h3>
        <?php if (isset($message)): ?>
            <p class="modele"><?php echo $message; ?></p>
        <?php endif; ?>
    </div>

    <div class="pieces">
        <?php if (empty($types_piece)): ?>
            <p>Aucun type de pièce disponible pour ce modèle.</p>
        <?php else: ?>
            <?php foreach ($types_piece as $type): ?>
                <a class="type" href="/produit?cars_id=<?php echo urlencode($cars_id); ?>&piece_id=<?php echo urlencode($type['piece_id']); ?>" >
                    <div >
                        <img src="<?php echo htmlspecialchars($type['img_type'] ?? '/assets/img/default.jpg'); ?>" 
                        alt="<?php echo htmlspecialchars($type['nom_piece']); ?>">
                        <p><?php echo htmlspecialchars($type['nom_piece']); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>


    <script src="./assets/js/script.js"></script>
</body>

</html>