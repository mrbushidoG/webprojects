<?php
include("connect_db.php");

if ($_GET) {
    $email = $_GET['email'];
    $password = $_GET['password'];

    if (!empty($email) && !empty($password)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Enter a valid email Address";
        } else {
            $checkEmail = 'SELECT email FROM users';
            if ($result = mysqli_query($connect_db, $checkEmail)) {
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['email'] == $email) {
                        echo "This email is already registered please use a different one";
                        break;
                    } else {
                        $add_record = "INSERT INTO users(email,password,name) VALUES('$email','$password','nametest')";
                        if (mysqli_query($connect_db, $add_record)) {
                            echo "You have registered with Email ID of " . $email;
                            break;
                        } else {
                            echo "Something went wrong, try again later";
                            break;
                        }
                    }
                }
            }
        }
    } else {
        echo "Please fill both the email and password";
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up form</title>
</head>

<body>
    <form action="" method="get">
        <label for="email-id">Email</label>
        <input type="email" name="email" id="email-id"><br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button type="submit">Sign Up</button>
    </form>
</body>

</html>