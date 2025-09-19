<?php
require_once 'config/database.php';

$message = '';
$messageType = '';

if ($_POST) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $messageText = trim($_POST['message']);
    
    if (!empty($name) && !empty($email) && !empty($messageText)) {
        // Here you can add email sending functionality
        // For now, we'll just show a success message
        $message = 'Thank you for your message! We will get back to you soon.';
        $messageType = 'success';
    } else {
        $message = 'Please fill in all required fields.';
        $messageType = 'danger';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Travel Website</title>
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
                        <a class="nav-link" href="destinations.php">
                            <i class="fas fa-map-marker-alt me-1"></i>Destinations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">
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
            <h1><i class="fas fa-envelope me-2"></i>Contact Us</h1>
            <p class="lead">Get in touch with our travel experts</p>
        </div>

        <div class="row">
            <div class="col-md-8">
                <?php if ($message): ?>
                    <div class="alert alert-<?= $messageType ?>" role="alert">
                        <i class="fas fa-<?= $messageType === 'success' ? 'check-circle' : 'exclamation-triangle' ?> me-2"></i>
                        <?= $message ?>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-paper-plane me-2"></i>Send us a Message</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-info-circle me-2"></i>Contact Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6><i class="fas fa-map-marker-alt me-2"></i>Address</h6>
                            <p>MG Travel Street<br>Bangalore, karnataka 560000</p>
                        </div>
                        <div class="mb-3">
                            <h6><i class="fas fa-phone me-2"></i>Phone</h6>
                            <p>+1 (555) 123-4567</p>
                        </div>
                        <div class="mb-3">
                            <h6><i class="fas fa-envelope me-2"></i>Email</h6>
                            <p>info@travelsite.com</p>
                        </div>
                        <div class="mb-3">
                            <h6><i class="fas fa-clock me-2"></i>Business Hours</h6>
                            <p>Mon - Fri: 9:00 AM - 6:00 PM<br>Sat - Sun: 10:00 AM - 4:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
