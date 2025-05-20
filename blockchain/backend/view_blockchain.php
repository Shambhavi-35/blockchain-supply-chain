<?php
include 'db.php';

$stmt = $conn->prepare("SELECT * FROM blockchain ORDER BY id ASC");
$stmt->execute();
$blocks = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Blockchain</h2>";
foreach ($blocks as $block) {
    echo "<div style='border:1px solid #333; padding:10px; margin:10px;'>";
    echo "Product ID: " . $block['product_id'] . "<br>";
    echo "Status: " . $block['status'] . "<br>";
    echo "Timestamp: " . $block['timestamp'] . "<br>";
    echo "Previous Hash: " . $block['previous_hash'] . "<br>";
    echo "Current Hash: " . $block['current_hash'] . "<br>";
    echo "</div>";
}
?>
