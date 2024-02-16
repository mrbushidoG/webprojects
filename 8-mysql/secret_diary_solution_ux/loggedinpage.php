<?php
session_start();

if (array_key_exists("id", $_COOKIE)) {
    $_SESSION['id'] = $_COOKIE['id'];
}

if (array_key_exists("id", $_SESSION)) {
    echo "Logged in ! <a href='index.php?logout=1'>Log out</a>";
} else {
    header("Location: index.php");
}

include("header.php");


?>

<div class="container">
    <textarea id="diary" class="form-control"></textarea>
</div>


<?php
    include("footer.php");

?>