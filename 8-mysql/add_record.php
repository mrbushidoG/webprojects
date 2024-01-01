<?php 
include('connect_db.php');


$add_record = "INSERT INTO users(email,password) VALUES('myotheremail@email.com','mysecondpassword')";


if(mysqli_query($connect_db,$add_record)){
    echo "New Record Added";
}
else {
    "Error : ". $add_record."<br>".mysqli_error($connect_db);
}



?>