<?php
session_start(); // Start the session to access user information

include("Database.php");

// Check if item_id is provided in the POST request
if (isset($_POST['item_id']) && isset($_SESSION['user_id'])) {
    $item_id = intval($_POST['item_id']);
    $user_id = intval($_SESSION['user_id']); // Assuming user_id is stored in the session

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO user_chart (user_id, item_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $item_id);

    if ($stmt->execute()) {
        header("Location: shop.php?message=Item added to chart");
    } else {
        header("Location: shop.php?message=Failed to add item to chart");
    }

    $stmt->close();
} else {
    header("Location: shop.php?message=Invalid request");
}

$conn->close();
?>
