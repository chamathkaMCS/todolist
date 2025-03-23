<?php
session_start();

require_once '../includes/conn.inc.php'; 
$data = json_decode(file_get_contents("php://input"), true);
$userId = $_SESSION["userid"];

if (!empty($data["message"])) {
    $message = $conn->real_escape_string($data["message"]);
        $sql = "INSERT INTO items (itemName, userId) VALUES ('$message', '$userId')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Item added successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Message is required."]);
}

$conn->close();
?>