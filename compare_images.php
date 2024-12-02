<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['uploadedFile'])) {
        echo json_encode(['success' => false, 'error' => 'No file uploaded.']);
        exit;
    }

    // Get the uploaded file
    $uploadedFile = $_FILES['uploadedFile'];
    
    // Determine the reference image based on the type of upload (DTI or Barangay Clearance)
    $referenceImage = '';

    // Check if the file input came from DTI or Barangay Clearance
    if (isset($_POST['fileType'])) {
        $fileType = $_POST['fileType'];
        if ($fileType === 'dti') {
            $referenceImage = 'DTI.png';  // Reference image for DTI
        } elseif ($fileType === 'barangay-clearance') {
            $referenceImage = 'brgyclearance.png';  // Reference image for Barangay Clearance
        }
    }

    // Check if reference image is set
    if (!$referenceImage) {
        echo json_encode(['success' => false, 'error' => 'Reference image not found.']);
        exit;
    }

    // Upload the file and check for errors
    if ($uploadedFile['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'error' => 'Failed to upload file.']);
        exit;
    }

    // Check if the reference image exists on the server
    if (!file_exists($referenceImage)) {
        echo json_encode(['success' => false, 'error' => 'Reference image not found on server.']);
        exit;
    }

    try {
        // Load the uploaded image and reference image
        $uploadedImage = new Imagick($uploadedFile['tmp_name']);
        $referenceImageObj = new Imagick($referenceImage);

        // Optionally, resize images to the same dimensions for comparison (optional but recommended)
        if ($uploadedImage->getImageWidth() != $referenceImageObj->getImageWidth() || $uploadedImage->getImageHeight() != $referenceImageObj->getImageHeight()) {
            $referenceImageObj->resizeImage($uploadedImage->getImageWidth(), $uploadedImage->getImageHeight(), Imagick::FILTER_LANCZOS, 1);
        }

        // Compare the images using the Mean Square Error (MSE) metric
        $result = $uploadedImage->compareImages($referenceImageObj, Imagick::METRIC_MEANSQUAREERROR);
        $similarityScore = $result[1];

        // Check the similarity score threshold
        if ($similarityScore < 0.01) {  // A lower threshold means the images are very similar
            echo json_encode(['success' => true, 'message' => 'Images are identical.']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Images are different.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
?>
