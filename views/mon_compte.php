<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mon compte</title>

    <link rel="stylesheet" href="./assets/css/compte.css">
</head>

<body>
    <main>


        <!-- -----------info perso------ -->
        <h3>Mon compte</h3>
<div class="infos">
    <h5>Information personnelle</h5>
    <?php if (isset($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <div class="detail">
        <form method="POST" action="">
            <div class="detail">
                <label for="firstname">Prénom:</label>
                <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($_SESSION['user_firstname'] ?? ''); ?>" required>
                
                <label for="lastname">Nom:</label>
                <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($_SESSION['user_lastname'] ?? ''); ?>" required>
                
                <label for="address">Adresse:</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($_SESSION['user_address'] ?? ''); ?>" required>
                
                <label for="phone">Numéro de téléphone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($_SESSION['user_phone'] ?? ''); ?>" required pattern="^0[1-9](\d{2}){4}$" title="Entrez un numéro valide à 10 chiffres">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['user_email'] ?? ''); ?>" required     pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
                title="Veuillez entrer une adresse email valide">
                
                <button type="submit" name="update">Mettre à jour</button>
                <button type="submit" name="delete" onclick="return confirm('Attention voulez-vous vraiment supprimer votre compte ?');">Supprimer mon compte</button>
            </div>
        </form>
    </div>
</div>
         <!-- -----------info perso------ -->

         <!--------------historique achat----- -->

        <div class="historique">
            <h5>Historique</h5>
        </div>
        <div class="histo-achat">
          
            <div class="histo-achats">
                <img src="./assets/img/medium-_A3A6872.jpg" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur</p>

            </div>
            <div class="histo-achats">
                <img src="./assets/img/medium-_A3A6872.jpg" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur</p>

            </div>

        </div>
         <!--------------historique achat----- -->
    </main>




</body>
<script src="./assets/js/script.js"></script>
</html>