<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
    <link rel="stylesheet" href="./assets/css/produit.css">
</head>

<body>

<!-- 
    <main>
        <h2>Vos produits</h2>
        <section class="grille-produit">

            <div class="produit">
                <img src="https://placehold.co/200" alt="">
                <h4>produit 1</h4>
                <p class="prix">1000£</p>
                <a href="/description">
                    <button class="description">description</button>
                </a>
                <a  href="#">
                    <button class="ajt-panier">ajouter au panier</button>
                </a>
            </div>

            <div class="produit">
                <img src="https://placehold.co/200" alt="">
                <h4>produit 1</h4>
                <p class="prix">1500£</p>
                <a href="/description">
                    <button class="description">description</button>
                </a>
                <a href="">
                    <button class="ajt-panier">ajouter au panier</button>
                </a>
            </div>

            <div class="produit">
                <img src="https://placehold.co/200" alt="">
                <h4>produit 1</h4>
                <p class="prix">1000£</p>
                <a href="/description">
                    <button class="description">description</button>
                </a>
                <a href="">
                    <button class="ajt-panier">ajouter au panier</button>
                </a>
            </div>

            <div class="produit">
                <img src="https://placehold.co/200" alt="">
                <h4>produit 1</h4>
                <p class="prix">1500£</p>
                <a href="/description">
                    <button class="description">description</button>
                </a>
                <a href="">
                    <button class="ajt-panier">ajouter au panier</button>
                </a>
                


            </div>

         



        </section>

    </main> -->


    <main>
    
    <?php if (isset($message)): ?>
       <h2> <?php echo $message; ?></h2>
    <?php endif; ?>

    <section class="contnaire-produit">
        <?php if (empty($pieces)): ?>
            <p>Aucune pièce disponible pour cette combinaison.</p>
        <?php else: ?>
            <?php foreach ($pieces as $piece): ?>
                <div class="produit">
                    <img src="<?php echo htmlspecialchars($piece['img_piece']); ?>" 
                    alt="<?php echo htmlspecialchars($piece['nom_piece']); ?>">
                    <h4><?php echo htmlspecialchars($piece['nom_piece']); ?></h4>
                    <p class="prix"><?php echo htmlspecialchars($piece['prix']); ?> €</p>
                
                    <a href="/description?piece_id=<?php echo urlencode($piece['id_piece']); ?>">
                        <button class="description">Description</button>
                    </a>
                    <a href="/panier?action=add&piece_id=<?php echo urlencode($piece['id_piece']); ?>">
                        <button class="ajt-panier">Ajouter au panier</button>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</main>

    <script src="./assets/js/script.js"></script>
    <!-- <script src="./assets/js/test/ajoutPanier.js"></script> -->
</body>

</html>