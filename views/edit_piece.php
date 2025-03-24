<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une pièce</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h2>Modifier une pièce</h2>
    <form method="POST" action="/admin_dash">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id_piece" value="<?php echo $piece['id_piece']; ?>">

        <label for="nom_piece">Nom de la pièce :</label>
        <input type="text" id="nom_piece" name="nom_piece" value="<?php echo htmlspecialchars($piece['nom_piece']); ?>" required><br>

        <label for="img_piece">Image (URL) :</label>
        <input type="text" id="img_piece" name="img_piece" value="<?php echo htmlspecialchars($piece['img_piece']); ?>" required><br>

        <label for="prix">Prix :</label>
        <input type="number" step="0.01" id="prix" name="prix" value="<?php echo htmlspecialchars($piece['prix']); ?>" required><br>

        <label for="caracteristique">Caractéristiques :</label>
        <textarea id="caracteristique" name="caracteristique" required><?php echo htmlspecialchars($piece['carcteristique']); ?></textarea><br>

        <label for="descriptif">Descriptif :</label>
        <textarea id="descriptif" name="descriptif" required><?php echo htmlspecialchars($piece['descriptif']); ?></textarea><br>

        <label for="cars_id">Voiture :</label>
        <select id="cars_id" name="cars_id" required>
            <?php foreach ($cars as $car): ?>
                <option value="<?php echo $car['cars_id']; ?>" <?php echo $car['cars_id'] == $piece['cars_id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($car['cars_name']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="piece_id">Type de pièce :</label>
        <select id="piece_id" name="piece_id" required>
            <?php foreach ($types as $type): ?>
                <option value="<?php echo $type['piece_id']; ?>" <?php echo $type['piece_id'] == $piece['piece_id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($type['nom_piece']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Mettre à jour</button>
    </form>

    <a href="/admin_dash">Retour</a>
</body>
</html>