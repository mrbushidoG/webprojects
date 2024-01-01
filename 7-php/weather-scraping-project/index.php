<!DOCTYPE html>
<html lang="en">
<?php
require './simplehtmldom_1_9_1/simple_html_dom.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>Weather Scraping Project</title>
</head>

<body>

    <div class="position-absolute top-50 start-50 translate-middle">
        <h1>Weahter Information Site</h1>
        <form action="" method="get">
            <div class="position-relative">
                <div class="mb-3">
                    <label for="city-weather" class="form-label">Enter the name of the city or the country</label>
                    <input type="text" class="form-control" name="weather" id="city-weather" placeholder="E.g, London,Dubai" value=<?php echo $_GET['weather']; ?>>
                </div>
                <button class="btn btn-primary">Testing Button</button>
        </form>
        <br><br>
        <?php
        //$city_temp = explode("table", $html);
        if ($_GET) {
            $get_input = $_GET["weather"];
            // $html =file_get_html("https://www.weather-forecast.com/locations/$get_input");
            $html =file_get_html("https://www.weather-forecast.com/locations/$get_input/");
            $temp_info = $html->find('td', 0);
            echo "<div class=\"notification-bg\">" . $temp_info . "</div>";
    
            // if ($temp_info != "") {
            //     echo "<div class=\"notification-bg\">" . $temp_info . "</div>";
            // } else {
            //     //$split_more = explode('(1-3 day)', $temp_info);
            //     echo "<div class=\"danger-alert\">" . $get_input . " does not exist in our Database</div>";
            // }
        }


        ?>

    </div>


</body>

</html>