<?php
session_start();

include("Database.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the email exists in the database
    $sql = "SELECT id, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email;

            // Redirect to the dashboard or home page
            header("Location: dashboard.php");
            exit();
        } else {
            // Invalid password
            $_SESSION['login_error'] = 'Invalid password!';
            header("Location: login.php");
            exit();
        }
    } else {
        // Email not found
        $_SESSION['login_error'] = 'Email not found.';
        header("Location: login.php");
        exit();
    }

    // $stmt->close();
}

$conn->close();
?>