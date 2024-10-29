<?php
include 'connect.php';

$user_one_id = $_GET['user_one_id'];
$user_two_id = $_GET['user_two_id'];

$stmt = $conn->prepare("SELECT * FROM one_to_one_chats WHERE (user_one_id = ? AND user_two_id = ?) OR (user_one_id = ? AND user_two_id = ?) ORDER BY timestamp");
$stmt->bind_param("iiii", $user_one_id, $user_two_id, $user_two_id, $user_one_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
   $row['timestamp'] = date("g:i A", strtotime($row['timestamp']));  // Format timestamp
   $messages[] = $row;
}

echo json_encode($messages);
?>
