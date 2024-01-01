<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $customer_code = "";
    $phone_number = "";
    #$cooler_sn = $_GET['cooler-sn'];
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $customer_code = $_GET['customer-code'];
        $phone_number = $_GET['phone-number'];
        
    }

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Register Your Request</title>
</head>

<body>
    <div class="container">
        <div class="display-1">Register your cooler repair request</div>
        <form action="testfile.php" method="get">
            <div class="row">
                <div class="mb-3 col-sm-2">
                    <label for="customer-code" class="form-label">Customer Code</label>
                    <input type="text" class="form-control" id="customer-code" name="customer-code" placeholder="Example input placeholder">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-sm-2">
                    <label for="phone-number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone-number" name="phone-number" placeholder="Another input placeholder" ?>
                </div>
            </div>
            <div class="mb-3 col-sm-2">
                <label for="cooler-sn" class="form-label">Cooler Serial Number</label>
                <input type="text" class="form-control" id="cooler-sn" placeholder="Another input placeholder" name="cooler-sn">
            </div>
            <div class="mb-3 col-sm-5">
                <label for="description" class="form-label">Describe </label>
                <textarea rows="10" cols="10" type="text" class="form-control" id="description" placeholder="Another input placeholder"></textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
        <?php
        echo "<br><br><br>";
        echo "<p>$customer_code</p>";
        echo "<p>$phone_number</p>";
        
        
        ?>

    </div>



</body>

</html>