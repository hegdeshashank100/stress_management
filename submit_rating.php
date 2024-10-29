<?php
// Start the session and connect to the database
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $rating = $_POST['rating'];
    $comment = htmlspecialchars($_POST['comment']); // sanitize input

    // Insert rating into the database
    $query = "INSERT INTO user_ratings (username, rating, comment) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sis", $username, $rating, $comment);

    if ($stmt->execute()) {
        echo "Thank you for your feedback!";
        header("Location: index.php"); // Redirect after submission
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
