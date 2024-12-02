<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $business_name = htmlspecialchars(trim($_POST['business_name']));
    $business_type = htmlspecialchars(trim($_POST['business_type']));
    $contact_name = htmlspecialchars(trim($_POST['contact_name']));
    $contact_email = filter_var(trim($_POST['contact_email']), FILTER_SANITIZE_EMAIL);
    $contact_phone = htmlspecialchars(trim($_POST['contact_phone']));
    $business_description = htmlspecialchars(trim($_POST['business_description']));

    // Simple validation (you can expand this as needed)
    if (empty($business_name) || empty($business_type) || empty($contact_name) || empty($contact_email) || empty($contact_phone) || empty($business_description)) {
        echo "All fields are required. Please fill out the form completely.";
        exit;
    }

    if (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.";
        exit;
    }

    // Here, you can store the data into a database, send an email, etc.
    // For simplicity, we will just display the data back to the user.

    echo "<h2>Business Application Submitted Successfully!</h2>";
    echo "<p><strong>Business Name:</strong> " . $business_name . "</p>";
    echo "<p><strong>Business Type:</strong> " . $business_type . "</p>";
    echo "<p><strong>Contact Name:</strong> " . $contact_name . "</p>";
    echo "<p><strong>Contact Email:</strong> " . $contact_email . "</p>";
    echo "<p><strong>Contact Phone:</strong> " . $contact_phone . "</p>";
    echo "<p><strong>Business Description:</strong><br>" . nl2br($business_description) . "</p>";
} else {
    echo "Invalid form submission.";
}
?>
