<?php
include 'db.php';
include 'utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];
    $status = $_POST["status"];
    $timestamp = date("Y-m-d H:i:s");

    // Get the last block's hash
    $stmt = $conn->prepare("SELECT current_hash FROM blockchain WHERE product_id = ? ORDER BY id DESC LIMIT 1");
    $stmt->execute([$product_id]);
    $prevBlock = $stmt->fetch(PDO::FETCH_ASSOC);
    $previous_hash = $prevBlock ? $prevBlock['current_hash'] : '0';

    $current_hash = generateHash($product_id, $status, $timestamp, $previous_hash);

    // Insert new block
    $stmt = $conn->prepare("INSERT INTO blockchain (product_id, status, timestamp, previous_hash, current_hash) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$product_id, $status, $timestamp, $previous_hash, $current_hash])) {
        echo "Block added to blockchain.";
    } else {
        echo "Error adding block.";
    }
}
?>
