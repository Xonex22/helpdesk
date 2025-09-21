<?php
$host = 'localhost'; // Database host
$dbname = 'ticketing'; // Database name
$user = 'root'; // Database username
$pass = ''; // Database password

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}




header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SELECT category, sub_category FROM chart");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Failed to fetch data.']);
}
