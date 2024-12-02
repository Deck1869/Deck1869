<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bpld";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$user = $_POST['username'];
$email = $_POST['email'];
$company = $_POST['company'];
$pass = $_POST['password'];

$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
// Insert data into database
$sql = "INSERT INTO register (username, email, company, password) VALUES ('$user', '$email','$company','$pass')";

if ($conn->query($sql) === TRUE) {
    // Redirect to login page after successful registration
    header("Location: login.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>