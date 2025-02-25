<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/css/style_connexion.css">

   
</head>

<body>
    <form action="/inscription" method="POST">
        <h2>Inscription</h2>
        <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
        <div class="inputs">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" required>
    
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
    
            <label for="telephone">Numéro de téléphone</label>
            <input type="tel" id="telephone" name="telephone" placeholder="Numéro de téléphone" required  pattern="^0[1-9](\d{2}){4}$" title="Entrez un numéro valide à 10 chiffres">
    
            <label for="adresse">Adresse postale</label>
            <input type="text" id="adresse" name="adresse" placeholder="Adresse postale" >
    
            <!-- <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" placeholder="Ville" required> -->
    
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email"
            pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
            title="Veuillez entrer une adresse email valide, comme exemple@domaine.com"  required>
    
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required minlength="8"
            pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
            title="Doit contenir au moins une majuscule, une minuscule, un chiffre, un caractère spécial et 8 caractères au total." 
            required>
        </div>
    
        <p class="inscription">J'ai un compte. <br> Me <a href="/connexion">connecter</a></p>
    
        <div class="button">
            <button type="submit">M'inscrire</button>
        </div>
    </form>
    

    <script src="./assets/js/script.js"></script>
</body>
</html>