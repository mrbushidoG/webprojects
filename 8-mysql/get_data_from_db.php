<?php

include('connect_db.php');

if (mysqli_connect_errno()) {
    //die(mysqli_connect_error());
    die("error connecting to DB");
}

$query = 'SELECT * FROM users';

if($result = mysqli_query($connect_db,$query)){
    $row = mysqli_fetch_array($result);

    echo 'Your Email ID is: '.$row['email'].'<br>';
    echo 'Your Password is: '. $row['password'];
}


?>
