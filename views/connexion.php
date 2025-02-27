<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style_connexion.css">
</head>

<body>




    <form method="POST">
        <h2>Se connecter</h2>

        <div id="message">
        <?php if (isset($message)) {echo "<p>$message</p>"; } ?>
        </div>

        <div class="inputs">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Ex: exemple@domaine.com"
                pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                title="Veuillez entrer une adresse email valide, comme exemple@domaine.com" required>


            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required minlength="8"
                pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                title="Doit contenir au moins une majuscule, une minuscule, un chiffre, un caractère spécial et 8 caractères au total."
                required>
        </div>
        <div>
            <p class="inscription">Je n'ai pas de compte. <br>
                Me <a href="/inscription">créer un compte</a>.
            </p>
        </div>
        <div class="button">
            <button type="submit">Connexion</button>
        </div>
    </form>


    <script src="./assets/js/script.js"></script>
</body>

</html>