<?php
session_start();
include('connect_db.php');
$errorMessage = "";
$SignupEmail = "";
$SignupPassword = "";
$SignupEmail = "";
$SignupPassword = "";

if (isset($_POST['sign-up'])) {
    if (!empty($_POST['email-sign-up']) AND !empty($_POST['password-sign-up'])) {

        $SignupEmail = $_POST['email-sign-up'];
        $SignupPassword = password_hash($_POST['password-sign-up'],PASSWORD_DEFAULT);

        $IfSignupEmailExist = "SELECT email FROM users_diary WHERE email='$SignupEmail'";

        $query = mysqli_query($connect_db, $IfSignupEmailExist);
        if (mysqli_num_rows($query) > 0) {
            echo $SignupEmail . " already exist ";
        } else {
            if (!empty($SignupEmail) && !empty($SignupPassword)) {
                $createNewAccount = "INSERT INTO users_diary (email,password) VALUES('$SignupEmail','$SignupPassword')";
            } else {
                echo "Please make sure to fill in both emailID and passwordl";
            }
            if (mysqli_query($connect_db, $createNewAccount)) {
                echo "New Account has been created";
            } else {
                echo "Something went during account creation process";
            }
        }
    } else {
        echo "Please fill in both EmailID and password to sign up";
    }
} // when sign up is clicked


if (isset($_POST['login'])) {

    $LoginEmail = $_POST['email-login'];
    $loginPassword = mysqli_real_escape_string($connect_db,$_POST['password-login']);

    if (!empty($LoginEmail) && !empty($loginPassword)) {
        $queryLoginEmailExist = "SELECT * FROM users_diary WHERE email = '$LoginEmail'";
        $query = mysqli_query($connect_db,$queryLoginEmailExist);
        $row = mysqli_fetch_array($query);
        $password = mysqli_real_escape_string($connect_db,$loginPassword);
        $hasedPassword = password_hash($password,PASSWORD_DEFAULT);
        
        if (isset($row) AND array_key_exists('password',$row)){
            $passwordMatches = password_verify($loginPassword,$hasedPassword);
            if($passwordMatches){
                $_SESSION['email-id']=$LoginEmail;
                header("Location: secret_diary_page.php");
            }
            
        }
    } else {
        echo "Please fill in email ID and password";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Secret Diary</title>
</head>

<body>
    <form action="" method="post">
        <input type="email" name="email-sign-up" placeholder="Enter your email">
        <input type="password" name="password-sign-up" placeholder="Enter password">
        <button type="submit" class="btn btn-primary" name="sign-up">Sign-up</button>
    </form>
    <br>
    <form action="" method="post">
        <input type="email" name="email-login" placeholder="Enter your email">
        <input type="password" name="password-login" placeholder="Enter password">
        <button type="submit" class="btn btn-primary" name="login">Log in</button>
    </form>
</body>

</html>