<?php 
    session_start();

    if(array_key_exists("content",$_POST)){
        include("connect_db.php");

        $query = "UPDATE users SET diary = '".
            mysqli_real_escape_string($connect_db,$_POST['content'])."' WHERE id = ".
            mysqli_real_escape_string($connect_db,$_SESSION['id'])." LIMIT 1";

        mysqli_query($connect_db,$query);
             

    }// end array_key_exists

?>