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

// Handle POST request to update user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Update the user's data in the database
    $stmt = $conn->prepare("UPDATE users SET name = ?, role = ? WHERE matric = ?");
    $stmt->bind_param("sss", $name, $role, $matric);

    if ($stmt->execute()) {
        echo "<p>User updated successfully.</p>";
        echo "<a href='display.php'>Go back</a>";
    } else {
        echo "<p>Error updating user: " . $conn->error . "</p>";
    }

    $stmt->close();
    $conn->close();
    exit();
}

// Handle GET request to display form
if (isset($_GET['matric']) && !empty($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Fetch user data
    $stmt = $conn->prepare("SELECT matric, name, role FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "<p>No user found for the provided matric number.</p>";
        exit();
    }

    $stmt->close();
} else {
    echo "<p>Matric number not provided in the URL.</p>";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <form action="" method="post">
        <label for="matric">Matric:</label>
        <input type="text" id="matric" name="matric" value="<?php echo htmlspecialchars($user['matric']); ?>" readonly><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"><br>

        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="">Please select</option>
            <option value="lecturer" <?php if ($user['role'] == 'lecturer') echo "selected"; ?>>Lecturer</option>
            <option value="student" <?php if ($user['role'] == 'student') echo "selected"; ?>>Student</option>
        </select><br>

        <input type="submit" value="Update">
        <a href="display.php">Cancel</a>
    </form>
</body>
</html>
