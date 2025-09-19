<?php
require_once 'config/database.php';

// Fetch countries for dropdown
$stmt = $pdo->query("SELECT * FROM countries ORDER BY name");
$countries = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Fixed Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <!-- Logo/Brand -->
            <a class="navbar-brand fw-bold text-primary" href="index.php">
                <i class="fas fa-plane me-2"></i>TravelSite
            </a>
            
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">
                            <i class="fas fa-info-circle me-1"></i>About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="destinations.php">
                            <i class="fas fa-map-marker-alt me-1"></i>Destinations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">
                            <i class="fas fa-envelope me-1"></i>Contact
                        </a>
                    </li>
                </ul>
                
                <!-- Social Media Icons -->
                <div class="d-flex ms-3">
                    <a href="#" class="text-primary me-3" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-info me-3" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-danger" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content with top padding for fixed navbar -->
    <div class="container-fluid" style="padding-top: 80px;">
        <div class="row">
            <!-- Left sidebar: Country Options -->
            <div class="col-md-3 bg-light p-4">
                <h4 class="mb-3">
                    <i class="fas fa-globe me-2"></i>Country Options
                </h4>
                <div class="country-list">
                    <?php foreach ($countries as $country): ?>
                        <div class="country-item mb-3 p-3 border rounded shadow-sm" 
                             onclick="loadCountryDetails(<?= $country['id'] ?>)" 
                             style="cursor: pointer;">
                            <img src="assets/images/destinations/<?= $country['image_url'] ?>" 
                                 alt="<?= $country['name'] ?>" 
                                 class="img-fluid rounded mb-2" 
                                 style="height: 80px; width: 100%; object-fit: cover;">
                            <h6 class="fw-bold"><?= $country['name'] ?></h6>
                            <small class="text-muted">
                                <?= substr($country['description'], 0, 50) ?>...
                            </small>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Main Content Area -->
            <div class="col-md-9 p-4">
                <div id="destination-content">
                    <div class="hero-section text-center mb-5 p-4 bg-gradient text-white rounded">
                        <h1><i class="fas fa-suitcase-rolling me-2"></i>Select Your Dream Destination</h1>
                        <p class="lead">Choose from our featured destinations to explore amazing places around the world</p>
                    </div>
                    
                    <!-- Selected destination details -->
                    <div id="destination-details" class="mb-5 border rounded p-4">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Please select a destination from the left sidebar to view details and book your trip.
                        </div>
                    </div>
                    
                    <!-- Enquiry Form -->
                    <div class="enquiry-section border rounded p-4 bg-light">
                        <h3 class="mb-3">
                            <i class="fas fa-paper-plane me-2"></i>Send Enquiry
                        </h3>
                        <form id="enquiryForm" method="POST" action="process/enquiry.php">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country" class="form-label">Interested Destination</label>
                                    <select class="form-select" id="country" name="country_id">
                                        <option value="">Select Destination</option>
                                        <?php foreach ($countries as $country): ?>
                                            <option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" 
                                          placeholder="Tell us about your travel preferences..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Submit Enquiry
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JavaScript Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
