<?php
// Database connection details
$servername = "localhost";
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "lab5_b"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the username and password from the form
$user = $_POST['matric'];
$pass = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM users WHERE matric = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass);

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

// Check if a user exists
if ($result->num_rows > 0) {
    // Authentication successful
    session_start();
    $_SESSION['username'] = $user; // Store username in session
    $_SESSION['logged_in'] = true;
    header("Location: display.php"); // Redirect to a welcome page
} else {
    // Authentication failed
    header("Location: login.php?error=1"); // Redirect back to login with error
}

// Close connection
$stmt->close();
$conn->close();
?>