<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

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

// Check if 'matric' is set in the URL
if (isset($_GET['matric']) && !empty($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Prepare and bind the delete query
    $stmt = $conn->prepare("DELETE FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);

    if ($stmt->execute()) {
        echo "<p>User with matric " . htmlspecialchars($matric) . " has been deleted successfully.</p>";
    } else {
        echo "<p>Error deleting user: " . $conn->error . "</p>";
    }

    $stmt->close();
} else {
    echo "<p>Matric number not provided in the URL.</p>";
}

$conn->close();
?>

<a href="display.php">Back to List</a>
