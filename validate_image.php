<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
    exit;
}

if (!isset($_FILES['uploadedFile'])) {
    echo json_encode(['success' => false, 'error' => 'No file uploaded.']);
    exit;
}

$file = $_FILES['uploadedFile'];
$allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
$maxFileSize = 5 * 1024 * 1024;

// Validate file type
if (!in_array($file['type'], $allowedTypes)) {
    echo json_encode(['success' => false, 'error' => 'Invalid file type.']);
    exit;
}

// Validate file size
if ($file['size'] > $maxFileSize) {
    echo json_encode(['success' => false, 'error' => 'File size exceeds 5 MB.']);
    exit;
}

// Ensure upload directory exists
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$targetPath = $uploadDir . basename($file['name']);
if (move_uploaded_file($file['tmp_name'], $targetPath)) {
    echo json_encode(['success' => true, 'message' => 'File uploaded successfully.']);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to save the file.']);
}

?>
