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
$regUsername = $data["regUsername"];
$regEmail = $data["regEmail"];
$regPassword = $data["regPassword"];

// Insert user data into the database
$sql = "INSERT INTO users (username, email, password) VALUES ('$regUsername', '$regEmail', '$regPassword')";
if ($conn->query($sql) === TRUE) {
    $response = array("success" => true, "message" => "Registration successful");
} else {
    $response = array("success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error);
}

echo json_encode($response);

$conn->close();
?>
