<?php
$host = 'localhost';              // or 127.0.0.1
$dbname = 'blockchain_supply';   // your database name
$username = 'your_mysql_username';   // ✅ replace with your MySQL username
$password = 'your_mysql_password';   // ✅ replace with your MySQL password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Throw exceptions on errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Set character encoding
    $conn->exec("SET NAMES 'utf8';");

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
