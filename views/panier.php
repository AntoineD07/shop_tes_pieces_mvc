<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panier</title>
   
    <link rel="stylesheet" href="./assets/css/panier.css">
</head>

<body>

    <main>
        <section>
            <h3>
                Votre panier
            </h3>
            <div>

                <div class="avancement">
                    <div class="etape1">
                        <p>1</p>
                        <p>panier</p>
                    </div>
                    <div class="etape2">
                        <p>2</p>
                        <p>identification</p>
                    </div>
                    <div class="etape3">
                        <p>3</p>
                        <p>paiement</p>
                    </div>
                </div>

            </div>
            <div class="bouton">
                <a href="./flitreProduit.html">
                    <button>continuer mes achats</button>
                </a>
                <button>commander</button>

            </div>
            <div>
                <div class="contnaire-panier">

                    <div class="produit">
                        <div class="image">
                            <h5>kit frein</h5>
                            <img src="./assets/img/BBS_SUPER_RS_1.jpg" alt="produit">


                        </div>
                        <div class="quantite">
                            <p>quantité</p>
                            <input type="number" value="1" min="0" max="10" size="3">
                        </div>
                        <div class="prix">
                            <h6>Prix</h6>
                            <p>1800€</p>
                        </div>


                    </div>

                    <div class="produit">
                        <div class="image">
                            <h5>kit frein</h5>
                            <img src="./assets/img/BBS_SUPER_RS_1.jpg" alt="produit">


                        </div>
                        <div class="quantite">
                            <p>quantité</p>
                            <input type="number" value="1" min="0" max="10" size="3">
                        </div>
                        <div class="prix">
                            <h6>Prix</h6>
                            <p>2100€</p>
                        </div>


                    </div>

                    
                    <!-- ajout produit la -->
                    <div class="total">
                        <p>total</p>
                        <p>0$</p>
                    </div>
                </div>

            </div>
            <div class="bouton">
                <a href="./flitreProduit.html">
                    <button>continuer mes achats</button>
                </a>

                <a href="./paiment.html">
                    <button>commander</button>
                </a>
            </div>

        </section>
    </main>

</body>
<script src="./assets/js/script.js"></script>
<script src="./assets/js/panier.js"></script>

</html>