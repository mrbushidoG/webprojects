<?php 
  include('connect_db.php')  ;

  $name = "Abdo'man";

  $query = "SELECT email FROM users WHERE name= '". mysqli_real_escape_string($connect_db,$name)  . "'";

if($result = mysqli_query($connect_db,$query)){
  while($row=mysqli_fetch_array($result)){
    print_r($row);
  } 
    

    // echo 'Your Email ID is: '.$row['email'].'<br>';
    // echo 'Your Password is: '. $row['password'];
}
?>