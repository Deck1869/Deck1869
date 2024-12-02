
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $business_name = htmlspecialchars(trim($_POST['business_name']));
    $business_type = htmlspecialchars(trim($_POST['business_type']));
    $contact_name = htmlspecialchars(trim($_POST['contact_name']));
    $contact_email = filter_var(trim($_POST['contact_email']), FILTER_SANITIZE_EMAIL);
    $contact_phone = htmlspecialchars(trim($_POST['contact_phone']));
    $business_description = htmlspecialchars(trim($_POST['business_description']));

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
    $dbname = "bpld";
    $username = 'root';  
    $password = '';      // Change to your database password

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO applications (business_name, business_type, contact_name, contact_email, contact_phone, business_description) 
                               VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$business_name, $business_type, $contact_name, $contact_email, $contact_phone, $business_description]);

        echo "Business application submitted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid form submission.";
}

?>
