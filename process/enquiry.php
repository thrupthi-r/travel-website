<?php
require_once '../config/database.php';

if($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $stmt = $pdo->prepare("INSERT INTO enquiries (name, email, message) VALUES (?, ?, ?)");
    $result = $stmt->execute([$name, $email, $message]);
    
    if($result) {
        echo json_encode(['success' => true, 'message' => 'Enquiry submitted successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error submitting enquiry']);
    }
}
?>
