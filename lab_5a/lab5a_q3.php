<!DOCTYPE html>
<html lang="en">
<head>
    <title>Area of Rectangle</title>
</head>
<body>
    <?php
        $width = 4;
        $length = 2;

        function calculateArea(float $width, float $length){
            $area = $width * $length;

            echo "<strong>The area of the rectangle with a width of </strong><strong>" . $width . "</strong> <strong>and length of </strong><strong>" . $length . "</strong> <strong>is </strong><strong>" . $area . "</strong>";
        }

        calculateArea($width, $length);
    ?>
</body>
</html>
