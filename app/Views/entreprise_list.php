<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Entreprises - Topub</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-img-top {
        width: 100%;
        height: 200px; /* Taille fixe pour les images */
        object-fit: cover; /* Maintient le ratio de l'image et remplit l'espace défini */
        }
        .banner {
            background-image: url('img/1.jpg');
            background-size: cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        .input-banner {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 5px;
        }
        .ad {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            width: 200px;
            height: 500px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 9999;
        }
        .ad img {
            margin-top: 20px;
        }
        .ad.left {
            left: 0;
        }
        .ad.right {
            right: 0;
        }
        .ad-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-weight: bold;
            color: #000;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="ad left" id="left-ad">
    <span class="ad-close">&times;</span>
    <p>Espace Publicitaire</p>
    <img src="https://via.placeholder.com/180x250" alt="Bannière Publicitaire Gauche" class="img-fluid">
</div>

<div class="banner">
    <div class="input-banner">
        <!--<h1>Bienvenue sur Topub !</h1>-->
        <!--<input type="text" class="form-control" placeholder="Recherche...">-->
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <?php if (isset($entreprises) && count($entreprises) > 0): ?>
            <?php foreach ($entreprises as $entreprise): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <!-- Utilisation des images récupérées depuis la base de données -->
                        <img src="<?= base_url('uploads/' . esc($entreprise['image'])) ?>" class="card-img-top" alt="Image de l'Entreprise">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($entreprise['nom_entreprise']) ?></h5>
                            <a href="<?= base_url('/entreprise/' . $entreprise['id']) ?>" class="btn btn-primary">Voir l'entreprise</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune entreprise trouvée.</p>
        <?php endif; ?>
    </div>
</div>

<div class="ad right" id="right-ad">
    <span class="ad-close">&times;</span>
    <p>Espace Publicitaire</p>
    <img src="https://via.placeholder.com/180x250" alt="Bannière Publicitaire Droite" class="img-fluid">
</div>

<footer>
    <div class="container">
        <p>&copy; <?= date('Y') ?> Topub. Tous droits réservés.</p>
        <p><a href="#">Politique de confidentialité</a> | <a href="#">Conditions d'utilisation</a></p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    const leftAd = document.getElementById('left-ad');
    const rightAd = document.getElementById('right-ad');

    function showAds() {
        leftAd.style.display = 'block';
        rightAd.style.display = 'block';
    }

    function hideAds() {
        leftAd.style.display = 'none';
        rightAd.style.display = 'none';
    }

    document.querySelectorAll('.ad-close').forEach(function(btn) {
        btn.addEventListener('click', function() {
            hideAds();
            setTimeout(showAds, 10 * 1000); // 10 secondes
        });
    });

    // Initial display of ads
    setTimeout(showAds, 100); // Show ads after 0.1 seconds for demo
</script>
</body>
</html>
