<?php
require_once 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Travel Website</title>
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
                        <a class="nav-link active" href="about.php">
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
        <div class="row">
            <div class="col-md-12">
                <div class="hero-section text-center mb-5 p-4 bg-gradient text-white rounded">
                    <h1><i class="fas fa-info-circle me-2"></i>About TravelSite</h1>
                    <p class="lead">Your trusted partner for unforgettable travel experiences</p>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h2>Our Story</h2>
                        <p>TravelSite has been helping travelers explore the world for over a decade. We believe that travel is not just about visiting new places, but about creating memories that last a lifetime.</p>
                        
                        <h3>Our Mission</h3>
                        <p>To provide exceptional travel experiences that inspire, educate, and connect people with different cultures around the world.</p>
                        
                        <h3>Why Choose Us?</h3>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Expert travel consultants</li>
                            <li><i class="fas fa-check text-success me-2"></i>24/7 customer support</li>
                            <li><i class="fas fa-check text-success me-2"></i>Best price guarantee</li>
                            <li><i class="fas fa-check text-success me-2"></i>Customized travel packages</li>
                        </ul>
                    </div>
                    
                    <div class="col-md-6">
                        <h2>Our Team</h2>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <i class="fas fa-user-tie fa-3x text-primary mb-3"></i>
                                        <h5>John Smith</h5>
                                        <p class="text-muted">CEO & Founder</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <i class="fas fa-user-friends fa-3x text-info mb-3"></i>
                                        <h5>Sarah Johnson</h5>
                                        <p class="text-muted">Travel Director</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
