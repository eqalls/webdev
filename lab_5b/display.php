<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users Table</title>
</head>
<body>
<a href="logout.php">Logout</a>

<table border="1">
    <tr>
        <th>Matric</th>
        <th>Name</th>
        <th>AccessLevel</th>
        <th colspan="2">Action</th>
    </tr>
    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lab5_b";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve data
    $sql = "SELECT matric, name, role FROM users";
    $result = $conn->query($sql);

    // Display data in table format
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["matric"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["role"] . "</td>";
            echo "<td><a href='update.php?matric=" . $row["matric"] . "'>Update</a></td>";
            echo "<td><a href='delete.php?matric=" . $row["matric"] . "'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No users found.</td></tr>";
    }

    // Close connection
    $conn->close();
    ?>
</table>

</body>
</html>
