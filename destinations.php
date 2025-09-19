<?php
require_once 'config/database.php';

// Fetch all countries
$stmt = $pdo->query("SELECT * FROM countries ORDER BY name");
$countries = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations - Travel Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="index.php">
                <i class="fas fa-plane me-2"></i>TravelSite
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">
                            <i class="fas fa-info-circle me-1"></i>About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="destinations.php">
                            <i class="fas fa-map-marker-alt me-1"></i>Destinations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">
                            <i class="fas fa-envelope me-1"></i>Contact
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex ms-3">
                    <a href="#" class="text-primary me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-info me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-danger"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container" style="padding-top: 100px;">
        <div class="hero-section text-center mb-5 p-4 bg-gradient text-white rounded">
            <h1><i class="fas fa-map-marker-alt me-2"></i>Our Destinations</h1>
            <p class="lead">Explore amazing places around the world</p>
        </div>

        <div class="row">
            <?php foreach ($countries as $country): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="assets/images/destinations/<?= $country['image_url'] ?>" 
                             class="card-img-top" alt="<?= $country['name'] ?>" 
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-map-pin me-2"></i><?= $country['name'] ?>
                            </h5>
                            <p class="card-text"><?= $country['description'] ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="index.php#destination-<?= $country['id'] ?>" class="btn btn-primary">
                                <i class="fas fa-eye me-2"></i>View Details
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
