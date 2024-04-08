<?php
header("Content-Type: application/json");

// Database connection
$servername = "localhost";
$username = "root";
$password = 'D#FR$GG#D';
$dbname = "mylogin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from POST request
$data = json_decode(file_get_contents("php://input"), true);
$username = $data["username"];
$password = $data["password"];

// Query to check if the user exists
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $response = array("success" => true, "message" => "Login successful");
} else {
    $response = array("success" => false, "message" => "Invalid username or password");
}

echo json_encode($response);

$conn->close();
?>
