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
            $query = "SELECT * FROM users WHERE email = '" . $emailAddress . "' ";
            $result = mysqli_query($connect_db, $query);
            $row = mysqli_fetch_array($result);

            $password = mysqli_real_escape_string($connect_db, $_POST['password']);

            if (isset($row) and array_key_exists("password", $row)) {
                $passwordMatched = password_verify($password, $row['password']);

                if ($passwordMatched) {
                    $_SESSION['id'] = $row['id'];

                    if (isset($_POST['stay-loggedin'])) {
                        setcookie("id", $row['id'], time() + 60 * 60 * 24 * 365);
                    }

                    header("Location: loggedinpage.php");
                } else {
                    $error = "That email, password combination does not match";
                } // end else - password matches or doesn't

            } else {
                $error = "That email, password combination does not match";
            }
        } // end if-else for signUp == 1 or == 0
    } //end of error existing check

} // end if the submit exist


?>


<?php include('header.php'); ?>
    <div class="container" id="homePageContainer">

        <h1>Secret Diary</h1>

        <div class="error"><?php echo $error; ?></div>


        <!-- Sign Up Form -->
        <form action="" method="post" id="signUpForm">
            <span>Interested Sign up NOW!</span>
            <fieldset class="form-group">
                <input type="email" name="email" id="" class="form-control" placeholder="Your Email">
            </fieldset>

            <fieldset class="form-group">
                <input type="password" name="password" id="" class="form-control" placeholder="Password">
            </fieldset>

            <fieldset class="form-group">
                <span>Stay Logged In</span>
                <input type="checkbox" name="stay-loggedin" id="" value="1">
            </fieldset>

            <fieldset class="form-group">
                <input type="hidden" name="signUp" value="1">
                <input type="submit" value="Sign Up" class="btn btn-success" name="submit">
            </fieldset>

            <p><a class="toggleForms">Log In</a></p>


        </form>

        <!-- Log in Form -->
        <form action="" method="post" id="logInForm">
        <span>If you already have an account please log in</span>
            <fieldset class="form-group">
                <input type="email" name="email" id="" class="form-control" placeholder="Your Email">
            </fieldset>

            <fieldset class="form-group">
                <input type="password" name="password" id="" class="form-control" placeholder="Password">
            </fieldset>

            <fieldset class="form-group">
                <span>Stay Logged In</span>
                <input type="checkbox" name="stay-loggedin" id="" value="1">
            </fieldset>

            <fieldset class="form-group">
                <input type="hidden" name="signUp" value="0">
                <input type="submit" value="Log in" class="btn btn-success" name="submit">
            </fieldset>


            <p><a class="toggleForms">Sign Up</a></p>


        </form>

   <?php include('footer.php'); ?>