<?php 
include("inc/connect_db.php");
$query = "SELECT * FROM water_delivery";
$comment = $_POST['comment'];


if(array_key_exists('delivery-done',$_POST)){
    $doneButtonClicked = $_POST['delivery-done'];
    $updateRecord = "UPDATE water_delivery SET done = 'Delivery Done', comment = '$comment'   WHERE id = $doneButtonClicked LIMIT 1";
    if(mysqli_query($connect_db,$updateRecord)){
        echo "Record has been updated.";
        
    }
}

if(array_key_exists('delivery-not-done',$_POST)){
    $NotDoneButtonClicked = $_POST['delivery-not-done'];
    $updateRecord = "UPDATE water_delivery SET done = 'Delivery Not Done', comment = '$comment'   WHERE id = $NotDoneButtonClicked LIMIT 1";
    if(mysqli_query($connect_db,$updateRecord)){
        echo "Record has been updated.";
        
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Water Deliveries Follow up</title>
</head>

<body>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Salesman</th>
                <th>Customer Code</th>
                <th>Location</th>
                <th>Orders</th>
                <th>Done</th>
                <th>Comment</th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                if($result = mysqli_query($connect_db,$query)){
                    
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row['salesman']."</td>";
                        echo "<td>".$row['customer_code']."</td>";
                        echo "<td>".$row['location']."</td>";
                        echo "<td>".$row['order_details']."</td>";
                        echo "<td>".$row['done']."</td>";
                        echo "<td>".$row['comment']."</td>";
                        echo '<td><form action="" method="post">
                              <input type="text" name="comment" placeholder="Enter Your Comment"/><button type="submit" value="'.$row['id'].'" name="delivery-done">Done</button>
                              <button type="submit" value="'.$row['id'].'" name="delivery-not-done">Not Done</button></form></td></tr>';
                        
                            
                    }
                }
                
            ?>
        </tbody>
    </table>
</body>

</html>