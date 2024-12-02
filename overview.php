<?php
// PHP Section: To fetch any announcements from a database or static array
// (For this example, we're using a static array, but you can modify it to fetch announcements from a database)

$announcements = [
    [
        'title' => 'New Business Licensing Process',
        'message' => 'We have updated the business licensing process. Please review the new guidelines on our website.',
        'date' => '2024-11-23'
    ],
    [
        'title' => 'Holiday Schedule',
        'message' => 'Please be advised that our office will be closed from December 24th to January 2nd for the holidays.',
        'date' => '2024-11-22'
    ]
];

// Function to fetch announcements (could be from database)
function getAnnouncements() {
    global $announcements;
    return $announcements;
}

// Function to display the latest announcement
function displayAnnouncements($announcements) {
    foreach ($announcements as $announcement) {
        echo '<div class="announcement-box">';
        echo '<h3>' . htmlspecialchars($announcement['title']) . '</h3>';
        echo '<p>' . nl2br(htmlspecialchars($announcement['message'])) . '</p>';
        echo '<p><strong>Date:</strong> ' . htmlspecialchars($announcement['date']) . '</p>';
        echo '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPLD Overview</title>
    <style>
        body {
            font-family: 'Lato', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #aed6f1;
        }
        header {
            display: flex; /* Use flexbox to align items horizontally */
            align-items: center; /* Vertically align items */
            justify-content: center; /* Horizontally center the logo and text */
            background-color: #2c3cc6;
            color: white;
            padding: 20px 30px; /* Increased padding for more space */
            text-align: center;
        }
        header img {
            width: 100px; /* Increased logo size */
            height: auto;
            margin-right: 20px; /* Increased space between logo and text */
        }
        h1 {
            font-size: 36px; /* Increased font size for the header */
            margin: 0;
        }
        h2 {
        font-family: 'Lucida Console', Monospace; 
        font-size: 32px; 
        font-weight: bold; 
        color: #008080; 
        text-align: center; 
        }
        p {
            font-family: 'Courier New', Courier, monospace; 
            font-size: 20px; 
            color: #333;
        }
        main {
            padding: 10px;
        }
        /* Announcement box styles */
        .announcement-box {
            background-color: #d5f0f0;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            opacity: 0; /* Start hidden */
            animation: fadeIn 2s forwards; /* Apply fade-in animation */
        }

        .announcement-box h3 {
            margin-top: 0;
            color: #333;
        }

        .announcement-box p {
            font-size: 20px;
            color: #1121af;
        }

        /* Keyframe animation for fade-in effect */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        footer {
            background-color: #95a5a6;
            color: white;
            text-align: center;
            padding: 5px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

    <header>
        <img src="logos.png" alt="BPLD Logo"> <!-- Your logo image -->
        <h1>BPLD - Business and License Processing Department</h1>
    </header>

    <main>
        <h2>Welcome to Business and License Processing Department</h2>
        <p style="font-size: 30px;">
            The Business Permit and Licensing Department (BPLD) in Pasig City is responsible for issuing business permits and licenses for businesses operating within the city. It is a crucial department for entrepreneurs and businesses as it ensures compliance with local regulations and provides necessary permits for legal operations.
        </p>

        <h2>Important Announcements</h2>
        <?php
        // Display the latest announcements
        $latestAnnouncements = getAnnouncements();
        displayAnnouncements($latestAnnouncements);
        ?>
    </main>

    <footer>
        <p>&copy; 2024 BPLD. All rights reserved.</p>
    </footer>

</body>
</html>
