
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/navbar.css">
</head>
<body>
  
<nav>    
  
    
   

        <ul class="nav-links">
            <li>
                <a href="/index">acceuil</a>
            </li>
            <li>
                <a href="/mon_compte">mon compte</a>
            </li>

            <li>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="/connexion">connexion</a>
                <?php endif; ?>
          
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="/logout">Se déconnecter</a>
                <?php endif; ?>
            </li>
   
            <li>
                <a href="/inscription">inscription</a>
            </li>
        
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>

        </div>
        <a href="/index">
            <div class="logo">
                <img src="/assets/img/logo/logo_shop.png" alt="logo">
            </div>
        </a>

       
        <div class="panier"> 
            <a href="/panier">
            <p>&#128722</p>
        </a>
        </div>
        


    </nav>
</body>
<script src="/assets/js/script.js"></script>
</html>
