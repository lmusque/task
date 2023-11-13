<?php
require 'db_connect.php';
include 'config_session.php';

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $newShopName = isset($_POST['newShopName']) ? $_POST['newShopName'] : '';

    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $newShopName)) {
        echo "Invalid shop name. Only letters, numbers, and spaces are allowed.";
        exit;
    }

    $query = "UPDATE shop_name SET shopname = :shopname WHERE user_id = :user_id";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':shopname', $newShopName, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $result = $stmt->execute();

    if ($result) {
        echo "Shop name updated successfully!";
    } else {
        echo "Error updating shop name: " . $stmt->errorInfo()[2];
    }
} else {
    echo "User is not logged in.";
}
?>

