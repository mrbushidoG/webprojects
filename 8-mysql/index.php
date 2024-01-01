<?php
$connect_db = mysqli_connect('localhost', 'superuser', 'Kungfu@12', 'mysql_tutorial');


if(mysqli_connect_errno()){
    echo mysqli_connect_error();
    exit();
}else {
    echo "Connection to DB successful";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connecting to MySQL</title>
</head>

<body>
    <h1>Testing DB connection</h1>
    <?php
    $sql_query = "SELECT * FROM users";
    $result = $connect_db->query($sql_query);
    $loop_trhough = 0;
   while ($row = $result->fetch_array()) {
        echo $row['id']. ' '.$row['email']. ' '.$row['password'];
        
    }
    ?>
</body>

</html>