<?php
include 'connect.php';

$user_one_id = $_POST['user_one_id'];
$user_two_id = $_POST['user_two_id'];
$message = $_POST['message'];
$sent_by = $_POST['sent_by'];

$stmt = $conn->prepare("INSERT INTO one_to_one_chats (user_one_id, user_two_id, message, sent_by) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iisi", $user_one_id, $user_two_id, $message, $sent_by);

if ($stmt->execute()) {
   echo "Message sent successfully";
} else {
   echo "Error: " . $stmt->error;
}
?>
