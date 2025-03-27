<?php
session_start();
include_once(__DIR__ . '/../dbConnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['mail'];

    // Query to check if the email is already registered
    $stmt = $conn->prepare("SELECT COUNT(*) FROM student WHERE stu_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $_SESSION['statusMsg'] = "This email is already registered.";
    } else {
        $_SESSION['statusMsg'] = "This email is available for registration.";
    }

    header("../index.php"); // Redirect back to the form page (adjust path as needed)
    exit();
}
?>
