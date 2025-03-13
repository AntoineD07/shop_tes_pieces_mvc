<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panier</title>
   
    <link rel="stylesheet" href="./assets/css/panier.css">
    <link rel="stylesheet" href="/assets/css/navbar.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
</head>

<body>
<?php
include 'templates/navbar.php'; 
?>

             
<main>
    <section>
        <h3>Votre panier</h3>
        <!-- <div>
            <div class="avancement">
                <div class="etape1">
                    <p>1</p>
                    <p>Panier</p>
                </div>
                <div class="etape2">
                    <p>2</p>
                    <p>Identification</p>
                </div>
                <div class="etape3">
                    <p>3</p>
                    <p>Paiement</p>
                </div>
            </div>
        </div> -->

        <div class="bouton">
            <a href="/filtreProduit"><button>Continuer mes achats</button></a>
            <a href="/paiement"><button>Commander</button></a>
        </div>

        <div>
            <div class="contnaire-panier">
                <?php if (empty($_SESSION['cart'])): ?>
                    <p class="message">Votre panier est vide.</p>
                <?php else: ?>
                    <?php foreach ($_SESSION['cart'] as $pieceId => $item): ?>
                        <div class="produit">
                            <div class="info">
                                <div class="image">
                                    <h5><?php echo htmlspecialchars($item['name']); ?> <?php echo htmlspecialchars($item['modele'])?></h5>
                                    <p></p>
                                    <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="produit">
                                </div>
    
                                <div class="quantite-prix">
                                    <div class="quantite">
                                        <p>Quantité</p>
                                        <form action="/panier" method="post">
                                            <input type="hidden" name="action" value="update">
                                            <input type="hidden" name="piece_id" value="<?php echo $pieceId; ?>">
                                            <button type="submit" name="change" value="decrease">-</button>
                                            <input type="number" name="quantity" value="<?php echo $item['quantity'] ?? 1; ?>" min="0" max="10" size="3" readonly>
                                            <button type="submit" name="change" value="increase">+</button>
                                        </form>
                                    </div>
                                    <div class="prix"> 
                                        <h6>Prix</h6>
                                        <p><?php echo htmlspecialchars($item['price']); ?> €</p>
                                    </div>
                                </div>
                   
                        
                            </div>
                            <div class="supprimer">
                                    <form action="/panier" method="post">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="piece_id" value="<?php echo $pieceId; ?>">
                                        <button type="submit" id="supp">&#10060;</button>
                                    </form>
                                </div>
                        
                        </div>
                    <?php endforeach; ?>

                    <?php
                    // Calcul du total
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        $total += $item['price'] * ($item['quantity'] ?? 1);
                    }
                    ?>
                    <div class="total">
                        <p>Total du panier</p>
                        <p><?php echo number_format($total, 2); ?> €</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="bouton">
            <a href="/filtreProduit"><button>Continuer mes achats</button></a>
            <a href="/paiement"><button>Commander</button></a>
        </div>
    </section>
</main>
    <?php
    include 'templates/footer.php';
?>

    <script src="./assets/js/script.js"></script>

   
</body>


</html>