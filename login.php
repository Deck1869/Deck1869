<?php
ob_start();
session_start();

// Database configuration
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bpld";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize validation message
$validation_message = "";

// Login user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM register WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store user information in session
            $_SESSION['username'] = $user['username'];
            // Redirect to the dashboard
            header("Location: dashboard1.php");
            exit();
        } else {
            $validation_message = "Invalid username or password.";
        }
    } else {
        $validation_message = "User not found.";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('back1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #000080;
            color: #FFFFFF;
            width: 300px;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }
        
        .logo {
            display: block;
            margin: 0 auto 20px; 
            max-width: 100px; 
            height: auto;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #000080;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #3232c8;
            border: none;
            border-radius: 15px;
        }

        .button:hover {
            background-color: #000080;
        }

        .validation-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="umaagos.png" alt="Logo" class="logo">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <br><br>
            <a href="register.html" class="button">Register</a>
            <?php if (!empty($validation_message)): ?>
                <p class="validation-message"><?php echo htmlspecialchars($validation_message); ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
