<?php
 session_start();

 //$_SESSION['username'] = 'abdo';

 if($_SESSION['email'] != ''){
    echo "Welcome ".$_SESSION['email']." to our website";
 } else {
    header('Location: index.php');
 }
?>