<?php
session_start(); // Start the session to access user information

include("Database.php");
// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = intval($_SESSION['user_id']);

// Check if chart_id is provided in the POST request
if (isset($_POST['chart_id'])) {
    $chart_id = intval($_POST['chart_id']);

    // Prepare the SQL statement to delete the item
    $stmt = $conn->prepare("DELETE FROM user_chart WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $chart_id, $user_id);

    if ($stmt->execute()) {
        header("Location: shop.php?message=Item removed from chart");
    } else {
        header("Location: shop.php?message=Failed to remove item from chart");
    }

    $stmt->close();
} else {
    header("Location: shop.php?message=Invalid request");
}

$conn->close();
?>
