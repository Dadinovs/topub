<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $entreprise['nom_entreprise']; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Vos styles existants */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .entreprise-details {
            width: 100%;
            max-width: 100%;
            background: white;
            /*border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;*/
        }
        .header {
            background: #0056b3;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        .header p {
            font-size: 1.2rem;
            margin: 5px 0 0;
        }
        .content {
            padding: 20px;
        }
        .carousel-item img {
            width: 100%;
            height: auto;
        }
        .carousel-inner {
            position: relative;
            width: 100%;
            overflow: hidden;
            height: 500px;
            object-fit: cover;
        }
        .service-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
            transition: transform 0.2s;
        }
        .service-card:hover {
            transform: scale(1.05);
        }
        .service-card img {
            max-width: 100%;
            height: auto;
        }
        .footer {
            background: #0056b3;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
        }
    </style>
</head>
<body>

<div class="entreprise-details">

    <!-- Carousel Section -->
    <!-- Carousel Section -->
<!-- Carousel Section -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner">
        <?php if (!empty($entreprise['carousel_images'])): 
            $carouselImages = json_decode($entreprise['carousel_images']); // Decode the JSON
            foreach ($carouselImages as $index => $image): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                    <img src="<?= base_url('uploads/carousel/' . $image); ?>" class="d-block w-100" alt="Image du carrousel <?= $index + 1; ?>">
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="carousel-item active">
                <img src="<?= base_url('img/1.jpg'); ?>" class="d-block w-100" alt="Image par défaut">
            </div>
        <?php endif; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Précédent</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Suivant</span>
    </a>
</div>

<div class="header">
    <h1>Bienvenue chez <?= $entreprise['nom_entreprise']; ?></h1>
</div>



    <!-- About Section -->
    <div class="content d-flex flex-row">
        <div class="col-md-8">
            <h2>À Propos de nous</h2>
            <p><?= $entreprise['apropos']; ?></p>
        </div>
        <div class="col-md-4">
            <img class="entreprise-image" src="<?= base_url('uploads/' . $entreprise['image']); ?>" alt="<?= $entreprise['nom_entreprise']; ?>" style="width: 100%; height: auto;">
        </div>
    </div>

    <!-- Services Section -->
    <div class="content">
        <h2>Services Offerts</h2>
        <div class="row">
            <?php if (!empty($entreprise['services'])): ?>
                <?php foreach ($entreprise['services'] as $service): ?>
                    <div class="col-md-4 mb-3">
                        <div class="service-card p-3">
                            <h3><?= $service['service_name']; ?></h3>
                            <?php if (!empty($service['service_image'])): ?>
                                <img src="<?= base_url('uploads/services/' . $service['service_image']); ?>" alt="<?= $service['service_name']; ?>" class="img-fluid">
                            <?php else: ?>
                                <p>Aucune image disponible pour ce service.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun service disponible.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Location Section -->
    <div class="content">
        <h2>Localisation</h2>
        <div class="map-container">
            <?= $entreprise['localisations']; ?>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <p>&copy; <?= date("Y"); ?> <?= $entreprise['nom_entreprise']; ?>. Tous droits réservés.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
