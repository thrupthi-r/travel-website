<?php
require_once '../config/database.php';

if(isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM countries WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $country = $stmt->fetch();
    
    echo json_encode(['success' => true, 'country' => $country]);
} else {
    echo json_encode(['success' => false]);
}
?>
