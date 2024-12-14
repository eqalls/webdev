<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab 5a Q1</title>
</head>
<body>
    <?php
        $name = "Muhamad Haiqal Bin Mahathir";
        $matric_num = "DI220125";
        $course = "BIW";
        $years_study = 2;
        $address = "70, Jalan Niyor 5, Kampung Melayu Niyor";
    ?>
    <table>
        <tr>
            <td>Name</td>
            <td><?php echo "$name"; ?></td>
        </tr>
        <tr>
            <td>Matric No</td>
            <td><?php echo "$matric_num"; ?></td>
        </tr>
        <tr>
            <td>Course</td>
            <td><?php echo "$course"; ?></td>
        </tr>
        <tr>
            <td>Years of Study</td>
            <td><?php echo "$years_study"; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo "$address"; ?></td>
        </tr>
    </table>
</body>
</html>
