<?php

$connect_db = mysqli_connect(
    'localhost',
    'superuser',
    'Kungfu@123',
    'mysql_tutorial'
);


if (mysqli_connect_errno()) {
    //die(mysqli_connect_error());
    die("error connecting to DB");
} else {
    echo "You are connected to the database<br>";
}

?>
