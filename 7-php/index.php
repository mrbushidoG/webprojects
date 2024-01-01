<?php
$theNumber = $_GET['number'];
// Get variables
if (isset($theNumber) == 'GET') {
    if (is_numeric($theNumber)) {
        echo $theNumber;
    } else {
        echo "<p> ' " . $theNumber . " ' is not a number please enter a valid number</p>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Variables</title>
</head>

<body>

    <p>Enter any number you like</p>
    <form action="" method="get">
        <input type="text" name="number">
        <input type="submit" value="GO">
    </form>
</body>

</html>