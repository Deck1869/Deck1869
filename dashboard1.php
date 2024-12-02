<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard with Accordion Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-image: url('bg.png');
            background-size: cover;
            background-position: center;
        }

        .dashboard-sidebar {
            width: 250px;
            background-color: #5208f1;
            color: #fff;
            padding-top: 20px;
            height: 100vh;
            box-shadow: 2px 0 5px rgba(18, 6, 242, 0.944);
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        .dashboard-sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .accordion-item {
            width: 220px;
            background-color: #1eaaf6;
            border: 1px solid #32aaef;
            cursor: pointer;
            padding: 15px;
            color: #fff;
            font-weight: bold;
            margin: 5px auto;
            text-align: left;
            position: relative;
        }

        .accordion-item:hover {
            background-color: #555;
        }

        .accordion-item.active {
            background-color: #666;
        }

        .submenu-list {
            display: none;
            padding-left: 20px;
            background-color: #11c1f6;
        }

        .submenu-list li {
            cursor: pointer;
            padding: 10px;
            color: #fff;
            list-style: none;
        }

        .submenu-list li:hover {
            background-color: #25bbf7;
        }

        .content-container {
            flex-grow: 1;
            padding: 20px;
            background-color: #f9f9f9;
            margin-left: 250px; /* Sidebar size */
        }

        .content-section {
            display: none;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .content-section.active {
            display: block;
        }

        .content-image {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="dashboard-sidebar">
    <h2>Dashboard</h2>

    <div class="accordion-item" onclick="showContent('overview')">About</div>
    <div class="accordion-item" onclick="toggleAccordion(this)">Application Form</div>
    <ul class="submenu-list">
        <li onclick="showUploadSection('new-app')">NEW APPLICATION</li>
        <li onclick="showUploadSection('renew-app')">RENEWAL APPLICATION</li>
    </ul>
    <div class="accordion-item" onclick="toggleAccordion(this)">New Business</div>
    <ul class="submenu-list">
        <li onclick="showUploadSection('barangay-clearance')">Barangay Clearance</li>
        <li onclick="showUploadSection('dti')">DTI</li>
        <li onclick="showUploadSection('SEC-registration')">SEC Certificate</li>
    </ul>

    <div class="accordion-item" onclick="toggleAccordion(this)">Renewal</div>
    <ul class="submenu-list">
        <li onclick="showUploadSection('barangay-clearance')">Barangay Clearance</li>
        <li onclick="showUploadSection('dti')">DTI</li>
        <li onclick="showUploadSection('SEC-registration')">SEC Certificate</li>
    </ul>

    <div class="accordion-item" onclick="toggleAccordion(this)">Reports</div>
    <ul class="submenu-list">
        <li onclick="showContent('graph1')">Graph 1</li>
        <li onclick="showContent('graph2')">Graph 2</li>
        <li onclick="showContent('report1')">Report 1</li>
    </ul>
</div>

<div class="content-container">
    <!-- Overview Content Section (Initially Empty) -->
    <div id="overview" class="content-section">
        <!-- Content will be loaded dynamically here -->
    </div>

    <!-- New Application Section -->
    <div id="new-app" class="content-section">
        <h2>New Business Application</h2>
        <form action="process_application2.php" method="POST">
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
    </div>

    <!-- Renewal Application Section -->
    <div id="renew-app" class="content-section">
        <h2>ReNew Business Application</h2>
        <form action="process_application2.php" method="POST">
            <label for="control_no">Control no:</label><br>
            <input type="text" id="control_no" name="control_no" required><br><br>
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
    </div>

    <!-- Barangay Clearance Section -->
    <div id="barangay-clearance" class="content-section">
        <h2>Barangay Clearance</h2>
        <div class="file-upload">
            <label for="barangay-file-upload">📁 Upload File (PDF, Image Only)</label>
            <input type="file" id="barangay-file-upload" accept=".pdf, .jpg, .jpeg, .png" />
            <button onclick="uploadImage('barangay-file-upload', 'barangay-clearance')">Upload & Validate</button>
            <p id="barangay-file-upload-upload-status" style="color: red; display: none;"></p>
        </div>
    </div>

    <!-- DTI Section -->
    <div id="dti" class="content-section">
        <h2>DTI</h2>
        <div class="file-upload">
            <label for="DTI-file-upload">📁 Upload File (PDF, Image Only)</label>
            <input type="file" id="DTI-file-upload" accept=".pdf, .jpg, .jpeg, .png" />
            <button onclick="uploadImage('DTI-file-upload', 'dti')">Upload & Validate</button>
            <p id="DTI-file-upload-upload-status" style="color: red; display: none;"></p>
        </div>
    </div>

    <!-- SEC Certificate Section -->
    <div id="SEC-registration" class="content-section">
        <h2>SEC Certificate</h2>
        <div class="file-upload">
            <label for="SEC-file-upload">📁 Upload File (PDF, Image Only)</label>
            <input type="file" id="SEC-file-upload" accept=".pdf, .jpg, .jpeg, .png" />
            <button onclick="uploadImage('SEC-file-upload', 'SEC-registration')">Upload & Validate</button>
            <p id="SEC-file-upload-upload-status" style="color: red; display: none;"></p>
        </div>
    </div>
</div>

<script>
    // Toggle visibility for Accordion items
    function toggleAccordion(element) {
        const submenu = element.nextElementSibling;
        submenu.style.display = submenu.style.display === "block" ? "none" : "block";
    }

    // Show selected content section (overview, reports, etc.)
    function showContent(sectionId) {
        const allSections = document.querySelectorAll('.content-section');
        allSections.forEach(function(section) {
            section.classList.remove('active');
        });

        const activeSection = document.getElementById(sectionId);
        if (activeSection) {
            activeSection.classList.add('active');
        }

        if (sectionId === 'overview') {
            // Load the content from overview.php dynamically
            fetch('overview.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('overview').innerHTML = data;
                    document.getElementById('overview').classList.add('active');
                })
                .catch(error => {
                    console.error('Error loading the overview content:', error);
                });
        }
    }

    // Show file upload section based on the clicked item (Barangay Clearance, DTI, etc.)
    function showUploadSection(sectionId) {
        const allSections = document.querySelectorAll('.content-section');
        allSections.forEach(function(section) {
            section.classList.remove('active');
        });

        const activeSection = document.getElementById(sectionId);
        if (activeSection) {
            activeSection.classList.add('active');
        }
    }

    // Handle file upload and validation
    function uploadImage(fileInputId, sectionId) {
        const fileInput = document.getElementById(fileInputId);
        const fileType = fileInput.files[0].type;
        const status = document.getElementById(`${fileInputId}-upload-status`);

        if (!fileInput.files.length) {
            status.textContent = 'Please select a file to upload.';
            status.style.color = 'red';
            status.style.display = 'block';
            return;
        }

        // Check if the file is an image or PDF
        if (!fileType.startsWith('image/') && fileType !== 'application/pdf') {
            status.textContent = 'Invalid file type. Please upload an image or PDF file.';
            status.style.color = 'red';
            status.style.display = 'block';
            return;
        }

        const formData = new FormData();
        formData.append('file', fileInput.files[0]);
        formData.append('fileType', fileType);

        fetch('compare_images.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                status.textContent = data.message;
                status.style.color = 'green';
            } else {
                status.textContent = data.error;
                status.style.color = 'red';
            }
            status.style.display = 'block';
        })
        .catch(error => {
            console.error('Error:', error);
            status.textContent = 'An error occurred during the upload.';
            status.style.color = 'red';
            status.style.display = 'block';
        });
    }
</script>
<footer>
        <p>&copy; 2024 BPLD. All rights reserved.</p>
    </footer>
</body>
</html>
