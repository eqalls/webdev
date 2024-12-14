<!DOCTYPE html>
<html lang="en">
<head>
    <title>Students Table</title>
</head>
<body>
    <?php
        $students = [
            ['Name' => 'Alice', 'Program' => 'BIP', 'Age' => 21],
            ['Name' => 'Bob', 'Program' => 'BIS', 'Age' => 20],
            ['Name' => 'Raju', 'Program' => 'BIT', 'Age' => 22],
        ];
    ?>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Program</th>
            <th>Age</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student['Name']; ?></td>
            <td><?php echo $student['Program']; ?></td>
            <td><?php echo $student['Age']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
