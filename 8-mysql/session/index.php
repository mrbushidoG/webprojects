<?php

session_start();




if (array_key_exists('email', $_POST) or array_key_exists('password', $_POST)) {

    include('../connect_db.php');

    if ($_POST['email'] == '') {
        echo "<p>Email address is required.</p>";
    } else if ($_POST['password'] == '') {
        echo "<p>Password is required.</p>";
    } else {
        $query = "SELECT id FROM users WHERE email = '"
            . mysqli_real_escape_string($connect_db, $_POST['email']) . "'";

        $result = mysqli_query($connect_db, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<p>That email address has already been taken.</p>";
        } else {
            $query = "INSERT INTO users (email, password,name) VALUES ('"
                . mysqli_real_escape_string($connect_db, $_POST['email']) . "', '"
                . mysqli_real_escape_string($connect_db, $_POST['password']) . "','nametest')";


            if (mysqli_query($connect_db, $query)) {
                $_SESSION['email'] =$_POST['email'];

                header('Location: session.php');
            } else {
                echo "<p>There was a problem signing you up! Please try again later.</p>";
            }
        } // if the email wasn't taken yet
    } //they remembered the password and email

} //end array key exists if statement

?>

<form method="post">
    <input name="email" type="text" placeholder="Email address">
    <input name="password" type="password" placeholder="Password">

    <input type="submit" value="Sign up!">
</form>