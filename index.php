<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pintu</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0; /* Light grey background */
            font-family: Arial, sans-serif;
        }
        .container {
            width: 320px; /* Increased container width */
            height: 300px; /* Increased container height */
            border: 2px solid #000;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            background-color: #fff; /* White background */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adding shadow for depth */
        }
        h2 {
            color: #333; /* Dark grey text color */
        }
        p {
            font-size: 20px; /* Increased font size */
            margin-top: 15px; /* Added margin for spacing */
            color: #555; /* Dark grey text color */
        }
        .status-open {
            color: #28a745; /* Green color for open status */
        }
        .status-closed {
            color: #dc3545; /* Red color for closed status */
        }
        .door-image {
            width: 100px; /* Set width of image */
            margin-bottom: 20px; /* Added margin for spacing */
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="door.jpg" alt="Pintu" class="door-image"> <!-- Add an image for the door -->
        <h2>Status Pintu</h2>
        <?php
        // Door status, replace with logic or appropriate data for your application
        $door_open = true; // For example, here I set it as open

        // Checking the door status and determining the text to display
        if ($door_open) {
            $status_text = "Pintu Terbuka";
            $status_class = "status-open"; // Add a class for open status
        } else {
            $status_text = "Pintu Tertutup";
            $status_class = "status-closed"; // Add a class for closed status
        }
        ?>
        <p class="<?php echo $status_class; ?>"><?php echo $status_text; ?></p>
    </div>
</body>
</html>
