<?php

// Set header untuk menentukan bahwa respons adalah JSON
header('Content-Type: application/json');

// Pastikan method yang digunakan adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $sensor_id = $_POST['sensor_id'] ?? null;
    $temperature = $_POST['Temperature'] ?? null;
    $humidity = $_POST['Humidity'] ?? null;
        
        // Pastikan data yang diperlukan ada dalam array
        if ($sensor_id !== null && $temperature !== null && $humidity !== null) {
            
            // Lakukan koneksi ke database
            $host = 'localhost:3303'; // Ganti dengan host database Anda (defult $host = 'localhost')
            $db_name = 'pemrograman_iot'; // Ganti dengan nama database Anda
            $username = 'root'; // Ganti dengan nama pengguna database Anda
            $password = ''; // Ganti dengan password database Anda
            
            try {
                $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Siapkan statement SQL untuk menyimpan data sensor
                $stmt = $conn->prepare("INSERT INTO data (Temperature, Humidity, id_sensor) VALUES (:Temperature, :Humidity, :sensor_id)");
                 
                // Bind parameter ke statement
                $stmt->bindParam(':sensor_id', $sensor_id);
                $stmt->bindParam(':Temperature', $temperature);
                $stmt->bindParam(':Humidity', $humidity);

                // Eksekusi statement
                $stmt->execute();
                
                // Kirim respons sukses
                echo json_encode(array('success' => true, 'message' => 'Data sensor berhasil disimpan.'));
            } catch(PDOException $e) {
                // Kirim respons jika terjadi kesalahan saat menyimpan ke database
                echo json_encode(array('success' => false, 'message' => 'Gagal menyimpan data sensor: ' . $e->getMessage()));
            }
            
        } else {
            // Kirim respons jika data yang diperlukan tidak lengkap
            echo json_encode(array('success' => false, 'message' => 'Data sensor tidak lengkap.'));
        }
        
    
    
} else {
    // Kirim respons jika metode yang digunakan bukan POST
    echo json_encode(array('success' => false, 'message' => 'Metode yang digunakan tidak diizinkan.'));
}

?>
