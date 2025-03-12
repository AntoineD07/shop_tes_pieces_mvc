<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop tes piéces</title>
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/navbar.css">
    <link rel="stylesheet" href="/assets/css/footer.css">

</head>

<body>
    <?php
include 'templates/navbar.php'; 
?>

    <main>

        <div class="img-offre">
            <div class="text-offre">
                <p>Offre speciale une jante acheter une jante vendu</p>

            </div>

            <img src="/assets/img/image_accueil.jpg" alt="offre">

        </div>

        <div class="vente-titre">
            <h2>meilleur vente</h2>
        </div>
        <section class="meilleur-vente">

            <div class="vente">
                <img src="/assets/img/amortiseur/D2.jpg" alt="amortiseur">
                <p>Combinés Filetés D2 Street pour BMW Série 3 E30</p>
                <button> <a href="/description">description</a> </button>



            </div>
            <div class="vente">
                <img src="/assets/img/amortiseur/D2.jpg" alt="amortiseur">
                <p>Combinés Filetés D2 Street pour BMW Série 3 E30</p>
                <button> <a href="/description">description</a> </button>

            </div>

            <div class="vente">
                <img src="/assets/img/amortiseur/D2.jpg" alt="amortiseur">
                <p>Combinés Filetés D2 Street pour BMW Série 3 E30</p>
                <button> <a href="/description">description</a> </button>

            </div>

            <div class="vente">
                <img src="/assets/img/jante/BBS rs.jpg" alt="jante">
                <p>Jante BBS Super RS</p>
                <button> <a href="/description">description</a> </button>

            </div>
        </section>


        <section class="voiture">
            <div class="img-voiture">
                <h2>Votre voiture</h2>
            </div>
            <?php 
            // var_dump($cars);
            ?>
            <!-- recupere toute les info $cars dans index controleur -->
            <?php foreach ($cars as $car): ?>
                <!-- donne a chaque lien $car le bon id de $cars -->
                <a href="/filtreProduit?cars_id=<?php echo htmlspecialchars($car['cars_id']);?>"class="img-voiture">
                    <!-- recup img est nom est le donne a chaque lien -->
                    <div>
                        <img 
                         src="<?php echo htmlspecialchars($car['img']);?>"
                         alt="<?php echo htmlspecialchars($car['cars_name']);?>"
                        >
                        <p><?php echo htmlspecialchars($car['cars_name']);?></p>
                    </div>
                </a>
                <?php endforeach; ?>

        </section>





    </main>
<?php
    include 'templates/footer.php';
?>

    <script src="./assets/js/script.js"></script>

</body>

</html>