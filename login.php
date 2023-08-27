<?php
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $dbUsername, $dbPassword);

    if ($stmt->fetch() && password_verify($password, $dbPassword)) {
        $successResponse = [
            'status' => 'success',
            'message' => 'Logged in successfully!'
        ];
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode($successResponse, JSON_PRETTY_PRINT);
    } else {
        $failResponse = [
            'status' => 'failed',
            'message' => 'Login failed. Please check your username and password.'
        ];
        header('Content-Type: application/json');
        http_response_code(401);
        echo json_encode($failResponse, JSON_PRETTY_PRINT);
    }

    $stmt->close();
}

$conn->close();
?>
