<?php

$getList = file_get_contents("videogames.json");

$decodedJson = json_decode($getList, true);

$error = "";

if ($decodedJson == null) {
    $error = "There is no data";
}

// $selectedGame = "";
if(array_key_exists('get-video-game-info',$_GET)){

    $gameInfo = $_GET['get-video-game-info'];

    $getTheGame = file_get_contents('videogames.json');

    $selectedGame = json_decode($getTheGame,true);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Sandbox</title>
</head>

<body>
    <h2>Select the games you want to get info about</h2>
    <form action="" method="get">
        <select name="get-video-game-info" id="">
            <?php
            for ($i = 0; $i < count($decodedJson); $i++) {
                echo '<option value="' . $decodedJson[$i]['name'] . '">' .
                                         $decodedJson[$i]['name'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Get Info">
    </form>
    <?php
    
        if(!$selectedGame == "") {
            for ($i=0; $i < count($selectedGame); $i++) { 
                if($selectedGame[$i]['name'] == $gameInfo){
                    echo "Game Name: ".$selectedGame[$i]['name'] . '<br>' .
                         "Game Genre: ". $selectedGame[$i]['genre'] . '<br>' .
                         "Developer: ". $selectedGame[$i]['studio'] . '<br>';
                }
            };
        }
    ?>
</body>

</html>