<?php
function generateHash($product_id, $status, $timestamp, $previous_hash) {
    return hash('sha256', $product_id . $status . $timestamp . $previous_hash);
}
?>
