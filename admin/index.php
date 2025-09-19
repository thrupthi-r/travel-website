<?php
require_once '../config/database.php';

// Get all enquiries with country details
$stmt = $pdo->query("
    SELECT e.*, c.name as country_name 
    FROM enquiries e 
    LEFT JOIN countries c ON e.country_id = c.id 
    ORDER BY e.enquiry_date DESC
");
$enquiries = $stmt->fetchAll();

// Get statistics
$total_enquiries = count($enquiries);
$today_enquiries = 0;
$this_month_enquiries = 0;

foreach ($enquiries as $enquiry) {
    $enquiry_date = new DateTime($enquiry['enquiry_date']);
    $today = new DateTime();
    
    if ($enquiry_date->format('Y-m-d') == $today->format('Y-m-d')) {
        $today_enquiries++;
    }
    
    if ($enquiry_date->format('Y-m') == $today->format('Y-m')) {
        $this_month_enquiries++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-5px);
        }
        .enquiry-card {
            transition: all 0.3s ease;
        }
        .enquiry-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        .badge-country {
            font-size: 0.8rem;
            padding: 0.5rem 1rem;
        }
        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        .enquiry-message {
            max-height: 100px;
            overflow-y: auto;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Header -->
    <div class="admin-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-0">
                        <i class="fas fa-tachometer-alt me-3"></i>Travel Website Admin
                    </h1>
                    <p class="mb-0 opacity-75">Manage your travel enquiries</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="../index.php" class="btn btn-light" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i>View Website
                    </a>
                    <button onclick="location.reload()" class="btn btn-outline-light ms-2">
                        <i class="fas fa-sync-alt me-2"></i>Refresh
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Statistics Cards -->
        <div class="row mb-5">
            <div class="col-md-4 mb-3">
                <div class="card stats-card border-0 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope fa-3x mb-3"></i>
                        <h2 class="mb-2"><?= $total_enquiries ?></h2>
                        <p class="mb-0">Total Enquiries</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card stats-card border-0 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-calendar-day fa-3x mb-3"></i>
                        <h2 class="mb-2"><?= $today_enquiries ?></h2>
                        <p class="mb-0">Today's Enquiries</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card stats-card border-0 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-chart-line fa-3x mb-3"></i>
                        <h2 class="mb-2"><?= $this_month_enquiries ?></h2>
                        <p class="mb-0">This Month</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enquiries Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3><i class="fas fa-list me-2"></i>All Enquiries</h3>
            <div class="d-flex gap-2">
                <input type="text" id="searchInput" class="form-control" placeholder="Search enquiries..." style="width: 300px;">
                <select id="countryFilter" class="form-select" style="width: 200px;">
                    <option value="">All Countries</option>
                    <?php
                    $countries = array_unique(array_column($enquiries, 'country_name'));
                    sort($countries);
                    foreach ($countries as $country) {
                        if ($country) echo "<option value='$country'>$country</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <!-- Enquiries List -->
        <div class="row" id="enquiriesList">
            <?php if (empty($enquiries)): ?>
                <div class="col-12">
                    <div class="card text-center py-5">
                        <div class="card-body">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">No Enquiries Yet</h4>
                            <p class="text-muted">Enquiries from your website will appear here.</p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($enquiries as $enquiry): ?>
                    <div class="col-md-6 col-lg-4 mb-4 enquiry-item" 
                         data-name="<?= strtolower(htmlspecialchars($enquiry['name'])) ?>"
                         data-email="<?= strtolower(htmlspecialchars($enquiry['email'])) ?>"
                         data-country="<?= htmlspecialchars($enquiry['country_name']) ?>">
                        <div class="card enquiry-card border-0 shadow-sm h-100">
                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">
                                    <i class="fas fa-user me-2"></i><?= htmlspecialchars($enquiry['name']) ?>
                                </h6>
                                <small>#<?= $enquiry['id'] ?></small>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <strong><i class="fas fa-envelope me-2 text-primary"></i>Email:</strong><br>
                                    <a href="mailto:<?= $enquiry['email'] ?>" class="text-decoration-none">
                                        <?= htmlspecialchars($enquiry['email']) ?>
                                    </a>
                                </div>

                                <?php if ($enquiry['phone']): ?>
                                <div class="mb-3">
                                    <strong><i class="fas fa-phone me-2 text-success"></i>Phone:</strong><br>
                                    <a href="tel:<?= $enquiry['phone'] ?>" class="text-decoration-none">
                                        <?= htmlspecialchars($enquiry['phone']) ?>
                                    </a>
                                </div>
                                <?php endif; ?>

                                <div class="mb-3">
                                    <strong><i class="fas fa-map-marker-alt me-2 text-info"></i>Destination:</strong><br>
                                    <?php if ($enquiry['country_name']): ?>
                                        <span class="badge bg-info badge-country"><?= htmlspecialchars($enquiry['country_name']) ?></span>
                                    <?php else: ?>
                                        <span class="text-muted">Not specified</span>
                                    <?php endif; ?>
                                </div>

                                <?php if ($enquiry['message']): ?>
                                <div class="mb-3">
                                    <strong><i class="fas fa-comment me-2 text-warning"></i>Message:</strong>
                                    <div class="enquiry-message mt-2 p-2 bg-light rounded">
                                        <?= nl2br(htmlspecialchars($enquiry['message'])) ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="mb-0">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        <?= date('M j, Y - g:i A', strtotime($enquiry['enquiry_date'])) ?>
                                    </small>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="mailto:<?= $enquiry['email'] ?>?subject=Re: Your Travel Enquiry&body=Hi <?= htmlspecialchars($enquiry['name']) ?>,%0A%0AThank you for your enquiry about <?= $enquiry['country_name'] ?>." 
                                   class="btn btn-primary btn-sm w-100">
                                    <i class="fas fa-reply me-2"></i>Reply via Email
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- No results message -->
        <div id="noResults" class="text-center py-5" style="display: none;">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">No enquiries found</h4>
            <p class="text-muted">Try adjusting your search or filter criteria.</p>
        </div>
    </div>

    <!-- JavaScript for Search and Filter -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const countryFilter = document.getElementById('countryFilter');
            const enquiryItems = document.querySelectorAll('.enquiry-item');
            const noResults = document.getElementById('noResults');

            function filterEnquiries() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCountry = countryFilter.value;
                let visibleCount = 0;

                enquiryItems.forEach(item => {
                    const name = item.dataset.name;
                    const email = item.dataset.email;
                    const country = item.dataset.country;

                    const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm);
                    const matchesCountry = !selectedCountry || country === selectedCountry;

                    if (matchesSearch && matchesCountry) {
                        item.style.display = 'block';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                noResults.style.display = visibleCount === 0 ? 'block' : 'none';
            }

            searchInput.addEventListener('input', filterEnquiries);
            countryFilter.addEventListener('change', filterEnquiries);

            // Auto-refresh every 30 seconds
            setInterval(() => {
                const refreshBtn = document.querySelector('[onclick="location.reload()"]');
                if (refreshBtn) {
                    refreshBtn.innerHTML = '<i class="fas fa-sync-alt fa-spin me-2"></i>Refreshing...';
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }
            }, 30000);
        });
    </script>
</body>
</html>
