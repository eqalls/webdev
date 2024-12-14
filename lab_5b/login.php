<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<h2>Login</h2>

<?php
if (isset($_GET['error'])) {
    echo "<p>Invalid username or password, try <a href='login.php'>login</a> again</p>";
}
?>

<form action="authenticate.php" method="post">
    <label for="matric">Matric:</label><br>
    <input type="text" id="matric" name="matric" required><br><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>

<p><a href="register.php">Register</a> here if you have not</p>

</body>
</html>