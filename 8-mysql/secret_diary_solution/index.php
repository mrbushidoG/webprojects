<?php
session_start();
$error = "";

include("connect_db.php");

if (array_key_exists("logout", $_GET)) {
    session_unset();
    setcookie("id", "", time() - 60 * 60);
    $_COOKIE["id"] = "";
} else if (array_key_exists("id", $_SESSION) or array_key_exists("id", $_COOKIE)) {
    //go to loggedinpage if you're still logged in
    header("Location: loggedinpage.php");
} // end test for logout query

if (array_key_exists("submit", $_POST)) {

    if (!$_POST['email']) {
        $error .= "An email is required. <br>";
    }

    if (!$_POST['password']) {
        $error .= "A password is requried. <br>";
    }

    if ($error != "") {
        $error = "<p>There are errors that need your attention</p>" . $error;
    } else {
        $emailAddress = mysqli_real_escape_string($connect_db, $_POST['email']);

        if ($_POST['signUp'] == 1) {

            $query = "SELECT id FROM users WHERE email= '" . $emailAddress . "' LIMIT 1";

            $result = mysqli_query($connect_db, $query);

            if (mysqli_num_rows($result) > 0) {
                $error = "That email address is taken";
            } else {

                $password = mysqli_real_escape_string($connect_db, $_POST['password']);
                $password = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO users (email,password) VALUES ('" . $emailAddress . "','" . $password . "')";

                if (!mysqli_query($connect_db, $query)) {
                    $error .= "<p>Could not sign you up. Try again later</p>";
                    $error .= "<p>" . mysqli_error($connect_db) . "</p>";
                } else {
                    $id = mysqli_insert_id($connect_db);

                    $_SESSION['id'] = $id;

                    if (isset($_POST['stay-loggedin'])) {
                        setcookie("id", $id, time() * 60 * 60 * 24 * 365);
                    }

                    header("Location: loggedinpage.php");
                } // end of sign up test
            } // end if mysqli_num_rows test
        } else {
            $query = "SELECT * FROM users WHERE email = '".$emailAddress."' ";
            $result = mysqli_query($connect_db,$query); 
            $row = mysqli_fetch_array($result);

            $password = mysqli_real_escape_string($connect_db,$_POST['password']);

            if(isset($row) AND array_key_exists("password",$row)){
                $passwordMatched = password_verify($password,$row['password']);

                if($passwordMatched){
                    $_SESSION['id'] = $row['id'];

                    if(isset($_POST['stay-loggedin'])){
                        setcookie("id",$row['id'],time() + 60 * 60 * 24 * 365);
                    }

                    header("Location: loggedinpage.php");

                } else {
                    $error = "That email, password combination does not match";

                } // end else - password matches or doesn't

            } else {
                $error = "That email, password combination does not match";
            } 

        }// end if-else for signUp == 1 or == 0
    } //end of error existing check

} // end if the submit exist


?>

<div class="error"><?php echo $error; ?></div>

<!doctype html>
<html lang="en">

<head>
    <title>Secret Diary</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <!-- Sign Up Form -->
    <form action="" method="post">
        <input type="email" name="email" id="" placeholder="Your Email">
        <input type="password" name="password" id="" placeholder="Password">
        <input type="checkbox" name="stay-loggedin" id="" value="1">
        <input type="hidden" name="signUp" value="1">

        <input type="submit" value="submit" class="btn btn-primary" name="submit">
    </form>

    <!-- Log in Form -->
    <form action="" method="post">
        <input type="email" name="email" id="" placeholder="Your Email">
        <input type="password" name="password" id="" placeholder="Password">
        <input type="checkbox" name="stay-loggedin" id="" value="1">
        <input type="hidden" name="signUp" value="0">
        <input type="submit" value="Log in" class="btn btn-primary" name="submit">
    </form>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>