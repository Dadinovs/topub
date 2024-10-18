<?php
// index.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/saveentreprise.css">

    <style>
        
        /* assets/css/styles.css */

/* Styles du wrapper */
#wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
    transition: all 0.3s ease;
    padding-top: 56px; /* Hauteur de la navbar (56px pour Bootstrap) */
}

/* Sidebar Styles */
#sidebar-wrapper {
    min-width: 250px;
    max-width: 250px;
    background-color: #1b3049;
    transition: all 0.3s ease;
    position: fixed;
    top: 56px; /* Hauteur de la navbar */
    left: 0;
    height: 100%;
    overflow-y: auto;
}

#sidebar-wrapper .sidebar-heading {
    background-color: #1b3049;
    color: #fff;
}

#sidebar-wrapper .list-group a {
    background-color: #1b3049;
    border: none;
    padding: 15px 20px;
}

#sidebar-wrapper .list-group a:hover {
    background-color: #1b3049;
    color: #fff;
    text-decoration: none;
}

/* Page Content Styles */
#page-content-wrapper {
    width: 100%;
    padding: 20px;
    margin-left: 250px; /* Largeur de la sidebar */
    transition: all 0.3s ease;
}

/* Menu Toggled Styles */
#wrapper.toggled #sidebar-wrapper {
    margin-left: -250px;
}

#wrapper.toggled #page-content-wrapper {
    margin-left: 0;
}

/* Media Queries pour Responsiveness */
@media (max-width: 768px) {
    #sidebar-wrapper {
        margin-left: -250px;
    }
    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }
    #page-content-wrapper {
        margin-left: 0;
    }
    #wrapper {
        flex-direction: column;
    }
}


    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" style="background-color: #1b3049 !important;">
        <div class="container-fluid">
            <button class="btn btn-outline-light me-3" id="menu-toggle"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand" href="#">Nom_Entreprise</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Lien Télégram</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Autre action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Déconnexion</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Navbar -->

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-primary text-white" id="sidebar-wrapper" style="background-color: #1b3049 !important;">
            <!--<div class="sidebar-heading text-center py-4 fs-4 fw-bold text-uppercase border-bottom">
                Menu
            </div>-->
            <div class="list-group list-group-flush my-3">
                <a href="<?= base_url();?>dashboard" class="list-group-item list-group-item-action bg-primary text-white" style="background-color: #1b3049 !important;">
                    <i class="fas fa-tachometer-alt me-2"></i> Tableau de Bord
                </a>
                <a href="<?= base_url();?>save_entreprises" class="list-group-item list-group-item-action bg-primary text-white" style="background-color: #1b3049 !important;">
                    <i class="fas fa-user me-2"></i> Enreg. Entreprise
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="background-color: #1b3049 !important;">
                    <i class="fas fa-cog me-2"></i> Paramètres
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-primary text-white" style="background-color: #1b3049 !important;">
                    <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
        <div class="container-fluid" style="padding-top: 80px;">
            <?= $this->renderSection('content');  ?>
        </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap JS et dépendances -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom JS -->
    <script>

        // assets/js/scripts.js

document.getElementById("menu-toggle").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("wrapper").classList.toggle("toggled");
});

// Graphique avec Chart.js
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar', // Type de graphique (bar, line, pie, etc.)
        data: {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin'],
            datasets: [{
                label: 'Ventes',
                data: [12, 19, 8, 5, 2, 3],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)', // Vert
                    'rgb(47, 67, 98) !important', // Bleu
                    'rgba(255, 206, 86, 0.2)', // Jaune
                    'rgba(255, 99, 132, 0.2)', // Rouge
                    'rgba(153, 102, 255, 0.2)', // Violet
                    'rgba(255, 159, 64, 0.2)'  // Orange
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)', // Vert
                    'rgba(54, 162, 235, 1)', // Bleu
                    'rgba(255, 206, 86, 1)', // Jaune
                    'rgba(255, 99, 132, 1)', // Rouge
                    'rgba(153, 102, 255, 1)', // Violet
                    'rgba(255, 159, 64, 1)'  // Orange
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});


    </script>

<script src="assets/js/scripts.js"></script>
</body>
</html>
