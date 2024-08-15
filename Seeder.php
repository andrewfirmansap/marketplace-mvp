<?php

include("Database.php");
// Function to hash the password
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// User data
$email = "andrewfirmansap@gmail.com";
$plainPassword = "123456";
$hashedPassword = hashPassword($plainPassword);

// SQL query to insert a new user
$sql = "INSERT INTO users (email, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $hashedPassword);

if ($stmt->execute()) {
    echo "User inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
