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

        // Redirect to success page after successful form submission
        header("Location: success_page.php");
        exit;  // Ensure no further code execution after redirection

    } catch (PDOException $e) {
        // If there's an error, display the error message
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid form submission.";
}
?>
