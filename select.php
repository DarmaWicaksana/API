<?php
// Set the content type to JSON
header('Content-Type: application/json');

// Database configuration
$host = 'localhost:3303'; // Ganti dengan host database Anda (defult $host = 'localhost')
$dbname = 'pemrograman_iot'; // Ganti dengan nama database Anda
$username = 'root'; // Ganti dengan nama pengguna database Anda
$password = ''; // Ganti dengan password database Anda

try {
    // Establish a connection to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement for selecting data
    $stmt = $pdo->prepare("SELECT id_sensor, Temperature, Humidity FROM data");
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are results
    if($results) {
        // Output the data as JSON
        echo json_encode(['success' => true, 'data' => $results]);
    } else {
        // Output no data found
        echo json_encode(['success' => false, 'message' => 'No data found']);
    }
} catch(PDOException $e) {
    // Handle SQL error
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>