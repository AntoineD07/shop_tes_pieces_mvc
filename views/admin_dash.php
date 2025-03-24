<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>
<body>
    <?php
  include_once 'templates/navbar.php'
  ?>
 <body>
    <h2>Tableau de bord Admin</h2>
    <p>Bienvenue, <?php echo htmlspecialchars($_SESSION['user_email']); ?> !</p>

    <h3>Ajouter une nouvelle pièce</h3>
    <form method="POST" action="/admin_dash">
        <input type="hidden" name="action" value="add">

        <label for="nom_piece">Nom de la pièce :</label>
        <input type="text" id="nom_piece" name="nom_piece" required><br>

        <label for="img_piece">Image (URL) :</label>
        <input type="text" id="img_piece" name="img_piece" required><br>

        <label for="prix">Prix :</label>
        <input type="number" step="0.01" id="prix" name="prix" required><br>

        <label for="caracteristique">Caractéristiques :</label>
        <textarea id="caracteristique" name="caracteristique" required></textarea><br>

        <label for="descriptif">Descriptif :</label>
        <textarea id="descriptif" name="descriptif" required></textarea><br>

        <label for="cars_id">Voiture :</label>
        <select id="cars_id" name="cars_id" required>
            <?php
            $cars = $pieceModel->getAllCars();
            foreach ($cars as $car): ?>
                <option value="<?php echo $car['cars_id']; ?>">
                    <?php echo htmlspecialchars($car['cars_name']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="piece_id">Type de pièce :</label>
        <select id="piece_id" name="piece_id" required>
            <?php
            $types = $pieceModel->getAllTypes();
            foreach ($types as $type): ?>
                <option value="<?php echo $type['piece_id']; ?>">
                    <?php echo htmlspecialchars($type['nom_piece']); ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Ajouter la pièce</button>
    </form>

    <h3>Gérer les pièces</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Voiture</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pieces as $piece): ?>
                <tr>
                    <td><?php echo htmlspecialchars($piece['id_piece']); ?></td>
                    <td><?php echo htmlspecialchars($piece['nom_piece']); ?></td>
                    <td><?php echo htmlspecialchars($piece['cars_name']); ?></td>
                    <td><?php echo htmlspecialchars($piece['type_name']); ?></td>
                    <td><?php echo htmlspecialchars($piece['prix']); ?> €</td>
                    <td>
                        <a href="/edit_piece?action=edit&id_piece=<?php echo $piece['id_piece']; ?>">Modifier</a>
                        <a href="/admin_dash?action=delete&id_piece=<?php echo $piece['id_piece']; ?>" 
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette pièce ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>
  <script src="assets/js/script.js"></script>
</body>
</html>