<?php
// Define the target directory for uploaded files
$targetDir = "files/";

// Check if the directory exists; if not, create it
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Check if a file was uploaded via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = basename($file['name']); // Get the original file name
    $targetFilePath = $targetDir . $fileName; // Set the target file path

    // Check for upload errors
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo json_encode([
                'success' => true,
                'message' => 'File uploaded successfully.',
                'filePath' => $targetFilePath,
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to move uploaded file.',
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Upload error: ' . $file['error'],
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'No file uploaded.',
    ]);
}
