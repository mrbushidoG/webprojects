<?php
session_start();
$first_name = "";
$age = "";
if (array_key_exists('submit', $_POST)) {
    $_SESSION['name'] = $_POST['first-name'];
    $_SESSION['age'] = $_POST['age'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies and Session review</title>
</head>

<body>
    <form action="showinfo.php" method="post">
        <label for="firstname">First Name</label>
        <input type="text" name="first-name" id="firstname">

        <label for="age">Age</label>
        <input type="text" name="age" id="age">

        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>