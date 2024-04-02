<?php
// Enable error reporting and display for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
// Check if file upload form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if file was uploaded successfully
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
        // File uploaded successfully, perform additional processing if needed
        $filePath = 'uploads/' . basename($_FILES['fileToUpload']['name']);

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $filePath)) {
            // Return success response as JSON
            echo json_encode(['success' => true, 'filePath' => $filePath]);
            exit;
        } else {
            // Error moving uploaded file
            echo json_encode(['success' => false, 'message' => 'Error: Failed to move uploaded file.']);
            exit;
        }
    } else {
        // No file uploaded or error during upload
        echo json_encode(['success' => false, 'message' => 'Error: File upload error.']);
        exit;
    }
} else {
    // Invalid request method
    echo json_encode(['success' => false, 'message' => 'Error: Invalid request method.']);
    exit;
}


?>
