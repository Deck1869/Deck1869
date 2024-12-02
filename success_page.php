<!-- success_page.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submitted</title>
    <style>
        /* Optional: Styling to make sure the button is visible */
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Your application has been submitted successfully!</h2>

    <!-- Proceed Button with redirect to dashboard1.php -->
    <form action="dashboard1.php" method="get">
        <button type="submit">Proceed</button>
    </form>
</body>
</html>
