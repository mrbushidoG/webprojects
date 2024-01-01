<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using POST method</title>
</head>
<?php
if ($_POST) {
    $family = array("Ahmed", "Hibba", "Hajer", "Hind", "Abdel Rahim", "Osman");
    $age = $_POST['age'];

    $isKnown = false;

    foreach ($family as $name) {
        if ($name == $_POST['firstname']) {
            $isKnown = true;
            break;
        }
    } if($isKnown){
        echo "Hi $name you are $age years old";
    } else {
        echo "Who are you ?";
    }
    
}
?>

<body>


    <form action="" method="post">
        <p>Enter the name</p>
        <input type="text" name="firstname" id="">
        <p>Enter the age</p>
        <input type="text" name="age" id=""><br>
        <button type="submit">Submit</button>
    </form>



</body>

</html>