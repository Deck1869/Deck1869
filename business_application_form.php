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

    // Database connection
    $host = 'localhost';        
    $dbname = 'bpld';           
    $username = 'root';         
    $password = '';             

    try {
        // Create a new PDO instance for the database connection
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Set error handling to exceptions

        // Prepare SQL statement for inserting data into the applications table
        $stmt = $pdo->prepare("INSERT INTO applications (business_name, business_type, contact_name, contact_email, contact_phone, business_description)
                               VALUES (?, ?, ?, ?, ?, ?)");

        // Execute the prepared statement with the form values
        $stmt->execute([$business_name, $business_type, $contact_name, $contact_email, $contact_phone, $business_description]);

        // Success message
        echo "Business application submitted successfully!";
    } catch (PDOException $e) {
        // If there's an error, display the error message
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid form submission.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Application Form</title>
</head>
<body>
    <h2>Business Application Form</h2>

    <form action="process_application.php" method="POST">
        <label for="business_name">Business Name:</label><br>
        <input type="text" id="business_name" name="business_name" required><br><br>

        <label for="business_type">Business Type:</label><br>
        <input type="text" id="business_type" name="business_type" required><br><br>

        <label for="contact_name">Contact Name:</label><br>
        <input type="text" id="contact_name" name="contact_name" required><br><br>

        <label for="contact_email">Contact Email:</label><br>
        <input type="email" id="contact_email" name="contact_email" required><br><br>

        <label for="contact_phone">Contact Phone:</label><br>
        <input type="text" id="contact_phone" name="contact_phone" required><br><br>

        <label for="business_description">Business Description:</label><br>
        <textarea id="business_description" name="business_description" rows="4" required></textarea><br><br>

        <input type="submit" value="Submit Application">
    </form>
</body>
</html>
